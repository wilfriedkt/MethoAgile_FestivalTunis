<?php
session_start();
// Inclure le fichier de connexion à la base de données et les fonctions
require_once("bd/dbconnect.php"); // Fichier PHP contenant la connexion à votre BDD
require_once("fonction.php");

// Traiter les données du formulaire
$postData = $_POST;

if (isset($postData['inscription'])) {
    //Insertion dans la base de données
    if (!empty($postData['nom']) && !empty($postData['prenom']) && !empty($postData['sexe']) && !empty($postData['email']) && !empty($postData['adresse']) && !empty($postData['numeroTel']) && !empty($postData['motPasse']) && !empty($postData['ConfMotPasse'])) {
        
        $nom = htmlspecialchars($postData['nom']);
        $prenom = htmlspecialchars($postData['prenom']);
        $sexe = htmlspecialchars($postData['sexe']);
        $email = htmlspecialchars($postData['email']);
        $adresse = htmlspecialchars($postData['adresse']);
        $telephone = htmlspecialchars($postData['numeroTel']);
        $motPasse = htmlspecialchars(sha1($postData['motPasse']));
        $confirmeMotPasse = htmlspecialchars(sha1($postData['ConfMotPasse']));
        
        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Il faut un email valide pour s\'inscrire.';
        } 
        // Validation de la longueur du mot de passe
        elseif (strlen($postData['motPasse']) < 5) {
            $errMotPass = 'Le mot de passe est trop court.';
        } 
        // Vérification si les deux mots de passe correspondent
        elseif ($postData['motPasse'] != $postData['ConfMotPasse']) {
            $motPasseIncorrete = 'Le mot de passe doit être identique.';
        } 
        else {
            // Vérifier si l'email existe déjà
            $verifierEmail = $connexionDB->prepare("SELECT * FROM user WHERE email = ?");
            $verifierEmail->execute([$email]);
            $controlEmail = $verifierEmail->rowCount();
            
            if ($controlEmail == 0) {
                // Préparer la requête pour insérer les données de user
                $insertTableUser = $connexionDB->prepare("INSERT INTO user(nom, prenom, sexe, email, adresse, numTel, motPasse, ConfmotPasse) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $insertTableUser->execute([$nom, $prenom, $sexe, $email, $adresse, $telephone, $motPasse, $confirmeMotPasse]);

                $userID = $connexionDB->lastInsertId();
                if ($insertTableUser) {
                    // Compte valide, enregistrer l'ID de l'utilisateur dans la session
                    $_SESSION['LOGIN_USER'] = [
                        'user_id' => $userID,
                        'email' => $email,
                        'nom' => $nom
                    ];
                }
                
                // Redirection vers la page d'accueil
                redirectToUrl('index.php');
            } else {
                $emailExiste = 'Désolé mais cette adresse a déjà un compte.';
            }
        }
    } else {
        $remplirChamps = 'Remplissez tous les champs.';
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font-Awesome 5 - Brands and Solid -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css" integrity="sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css" integrity="sha512-SazV6tF6Ko4GxhyIZpKoXiKYndqzh7+cqxl9HDH7DGSpjkCN3QLqTAlhJHJnKxu3/2rfCsltzwFC4CmxZE1hPg==" crossorigin="anonymous" />
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 

    <!-- Customized CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Inscription</title>
    <style>
        /* Style amélioré pour le formulaire de connexion */
        body {
    font-family: 'Arial', sans-serif;
    background-color: #2c3e50;
    margin-left: 60px;
    margin-right: 60px; 
    padding: 0; /* Suppression des paddings */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    min-height: 100vh; /* Assure que l'écran est bien utilisé */
}

        nav .active5 a[class*='bgcolor-'] {
    color: white;
    background-color: #ff0000;
    font-weight: bold;
    }
    

header {
    width: 100%; /* La navbar occupe toute la largeur */
    position: relative; /* Maintient la navbar dans le flux normal */
}

.gdiv {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #34495e;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    margin-top: 20px; /* Un espacement raisonnable entre le header et le contenu */
}

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .connexion {
            color: #ecf0f1;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            font-weight: 600;
        }

        
        input {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #bdc3c7;
            margin-bottom: 15px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background-color: #2ecc71;
        }

        .div {
            margin: 10px 0;
            text-align: center;
            color: #ecf0f1;
        }

        .seconnecter {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        .seconnecter:hover {
            background-color: #3498db;
        }

        @media (max-width: 600px) {
            .gdiv {
                padding: 20px;
            }

            form {
                padding: 20px;
            }

            .connexion {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <header id="header">

    <?php require_once('navbar.php') ?>

    </header> <!-- /#header -->
    <div class="gdiv">
        <div class="connexion"><strong>INSCRIPTION</strong></div>

        <form action="" method="post">
            <label for="Nom">Nom</label>
            <input type="text" id="Nom" name="nom" required>

            <label for="Prenom">Prenom</label>
            <input type="text" id="Prenom" name="prenom" required>

            <label for="Sexe">Sexe</label>
            <input type="text" id="Sexe" name="sexe" required>


            <i style="color: red;">
                        <?php
                        if (isset($errEmail)) {
                            echo $errEmail;
                        } ?>
                    </i>

                    <i style="color: red;">
                        <?php
                        if (isset($emailExiste)) {
                            echo $emailExiste;
                        }
                        ?></i>

            <label for="Email">Email</label>
            <input type="text" id="Email" name="email" required>


            <label for="Adresse">Adresse</label>
            <input type="text" id="Adresse" name="adresse" placeholder="Côte d'Ivoire, Abidjan" required>

            <label for="NumeroTel">Numéro Téléphone</label>
            <input type="tel" id="NumeroTel" name="numeroTel"  required>


            <i style="color: red;">
                        <?php
                        if (isset($errMotPass)) {
                            echo $errMotPass;
                        } ?>
                    </i>
            <label for="mot_de_pass">Mot de passe</label>
            <input type="password" id="mot_de_pass" name="motPasse" required>

            
            <i style="color: red;">
                        <?php
                        if (isset($motPasseIncorrete)) {
                            echo $motPasseIncorrete;
                        } ?>
                    </i>

                    
            <label for="confirmpass">confirmez</label>
            <input type="password" id="confirmpass" name="ConfMotPasse" required>
            <br><br>

            <i style="color: red;">
                        <?php
                        if (isset($remplirChamps)) {
                            echo $remplirChamps;
                        } ?>
                    </i>

            <button type="submit" name="inscription" class="seconnecter">S'inscrire</button>
            <button type="reset" style="background-color:red;">Effacer</button>
            <div class="div">ou</div>
            <a href="connexion.php"> <button type="submit" name="connexion">Connexion</button></a>
        </form>
    </div>
</body>
</html>
