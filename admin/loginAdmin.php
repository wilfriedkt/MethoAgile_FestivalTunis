<?php
session_start();

require_once("../bd/dbconnect.php");
require_once("../fonction.php");

$postData = $_POST;

if (isset($postData['connexion'])) {
    if (!empty($postData['email']) && !empty($postData['motPasse'])) {
        $email = htmlspecialchars($postData['email']);
        $motPasse = htmlspecialchars($postData['motPasse']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Il faut un email valide pour se connecter.';
        } else {
            try {
                $reqEmail = $connexionDB->prepare("SELECT * FROM admin WHERE email = ?");
                $reqEmail->execute([$email]);
                $administrateur = $reqEmail->fetch(PDO::FETCH_ASSOC);

                if ($administrateur) {
                    if ($administrateur['motPasse'] === $motPasse) {
                        $_SESSION['LOGIN_ADMIN'] = [
                            'admin_id' => $administrateur['idAdmin'],
                            'email' => $email,
                            'nom' => $administrateur['nom'],
                            'prenom' => $administrateur['prenom']
                        ];

                        redirectToUrl('listeUser.php');
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
    <title>Connexion Admin</title>
    <style>
        /* Styles améliorés pour l'interface administrateur */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #1b263b;
            margin: 0;
        }
        
        .gdiv {
            background-color: #14213d;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .connexion {
            color: #fca311;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        form {
            background-color: #1f4068;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-size: 14px;
            color: #e0e1dd;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #778da9;
            margin-bottom: 15px;
            font-size: 16px;
            color: #1b263b;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #fca311;
            color: #1b263b;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background-color: #e5e5e5;
        }

        .div {
            margin: 10px 0;
            text-align: center;
            color: #fca311;
        }

        .seconnecter {
            width: 100%;
            padding: 12px;
            background-color: #d7263d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        .seconnecter:hover {
            background-color: #fca311;
        }

        /* Message d'erreur */
        .error-message {
            color: #d7263d;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="gdiv">
        <div class="connexion">Connexion Administrateur</div>

        <?php if (isset($errCompte)) : ?>
            <div class="error-message"><?php echo $errCompte; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="mot_de_pass">Mot de passe</label>
            <input type="password" id="motpasse" name="motPasse" required>

            <button type="submit" name="connexion">Connexion</button><br><br>
            <button type="reset" style="background-color: #d7263d; color: white;">Effacer</button>
        </form>
    </div>
</body>
</html>
