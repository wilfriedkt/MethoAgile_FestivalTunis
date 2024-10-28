<?php
session_start();
require_once("../bd/dbconnect.php");

if (isset($_POST['ajouterResponsableProduction'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $numTel = htmlspecialchars($_POST['numTel']);
    $motPasse = password_hash($_POST['motPasse'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Vérifier si l'email existe déjà
    $checkEmail = $connexionDB->prepare("SELECT COUNT(*) FROM responsable_production WHERE email = ?");
    $checkEmail->execute([$email]);
    $emailExists = $checkEmail->fetchColumn();

    if ($emailExists) {
        $userAjoute = "<div class='alert alert-danger'>❌ Cet email est déjà utilisé. Veuillez en choisir un autre.</div>";
    } else {
        $sql = "INSERT INTO responsable_production (nom, prenom, email, telephone, motPasse) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connexionDB->prepare($sql);

        if ($stmt->execute([$nom, $prenom, $email, $numTel, $motPasse])) {
            $userAjoute = "<div class='alert alert-success'>✔️ Responsable de production ajouté avec succès.</div>";
        } else {
            $userAjoute = "<div class='alert alert-danger'>❌ Erreur lors de l'ajout du Responsable de productio.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Responsable de Production</title>
    <style>
        /* Style général pour le corps de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f3;
            color: #3a3a3a;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Conteneur principal */
        .container {
            width: 100%;
            max-width: 450px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        /* Titre de la page */
        h2 {
            font-size: 26px;
            color: #007B8F;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Champs de formulaire */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            color: #007B8F;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d1d1;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #007B8F;
            box-shadow: 0 0 5px rgba(0, 123, 143, 0.3);
            outline: none;
        }

        /* Bouton d'ajout d'utilisateur */
        .btn-custom {
            width: 100%;
            padding: 14px;
            font-size: 18px;
            color: #ffffff;
            background-color: #007B8F;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #005f6b;
        }

        /* Alertes de réussite et d'erreur */
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .alert-success {
            color: #ffffff;
            background-color: #28a745;
        }

        .alert-danger {
            color: #ffffff;
            background-color: #dc3545;
        }

        /* Ajout d'icônes aux messages d'alerte */
        .alert-success:before, .alert-danger:before {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un Responsable de Production</h2>
        <?php if (!empty($userAjoute)) echo $userAjoute; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="numTel">Numéro de Téléphone</label>
                <input type="text" name="numTel" id="numTel" required>
            </div>
            <div class="form-group">
                <label for="motPasse">Mot de Passe</label>
                <input type="password" name="motPasse" id="motPasse" required>
            </div>
            <button type="submit" name="ajouterResponsableProduction" class="btn-custom">Ajouter Utilisateur</button>
        </form>
    </div>
</body>
</html>
