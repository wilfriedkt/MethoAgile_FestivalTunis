<?php
session_start(); // Démarrer la session

require_once("bd/dbconnect.php");  // connection à la base de données
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()

// Traiter les données du formulaire
$postData = $_POST;

if (isset($postData['connexion'])) {
    // Vérifier si les champs email et mot de passe ne sont pas vides
    if (!empty($postData['email']) && !empty($postData['motPasse'])) {
        $email = htmlspecialchars($postData['email']);
        $motPasse = htmlspecialchars(($postData['motPasse']));

        // Valider l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Il faut un email valide pour se connecter.';
        } else {
            try {
                // Vérifier l'existence de l'email dans la table responsable_production
                $reqEmail = $connexionDB->prepare("SELECT * FROM responsable_production WHERE email = ?");
                $reqEmail->execute([$email]);
                $responsable = $reqEmail->fetch(PDO::FETCH_ASSOC);

                if ($responsable) {
                    // Vérifier l'existence du mot de passe pour l'utilisateur trouvé
                    if ($responsable['motPasse'] === $motPasse) {
                        // Compte valide, enregistrer l'ID de l'utilisateur dans la session
                        $_SESSION['LOGIN_RESPONSABLE'] = [
                            'responsable_id' => $responsable['idResponsable'],
                            'email' => $email,
                            'nom' => $responsable['nom'],
                            'prenom' => $responsable['prenom']
                        ];

                        // Redirection vers la page d'accueil
                        redirectToUrl('respoProductionFilmS.php');
                    } else {
                        $errCompte = "Désolé, mot de passe incorrect.";
                    }
                } else {
                    $errCompte = "Désolé, cet email n'est pas enregistré.";
                }
            } catch (PDOException $e) {
                echo 'Erreur: ' . $e->getMessage();
                exit;
            }
        }
    } else {
        $remplirChamps = 'Remplissez tous les champs';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Connexion Responsable de Production</title>
    <style>
        /* Style amélioré pour le formulaire de connexion */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #ecf0f1;
        }
        
        .gdiv {
            background-color: #34495e;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
    </style>
</head>
<body>
    <div class="gdiv">
        <div class="connexion"><strong>SE CONNECTER EN TANT QUE RESPONSABLE DE PRODUCTION</strong></div>

        <?php if (isset($errCompte)) : ?>
            <div style="color: red;"><?php echo $errCompte; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="mot_de_pass">Mot de passe</label>
            <input type="password" id="motpasse" name="motPasse" required>

            <button type="submit" name="connexion">Connexion</button>
            <button type="reset" style="background-color:red;">Effacer</button>
        </form>
    </div>
</body>
</html>
