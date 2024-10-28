<?php
session_start();
require_once("../bd/dbconnect.php"); // Fichier PHP contenant la connexion à votre BDD;
require_once("../fonction.php");

if (isset($_POST['ajouterUtilisateur'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $numTel = htmlspecialchars($_POST['numTel']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $motPasse = sha1($_POST['motPasse'], PASSWORD_DEFAULT); // Hachage du mot de passe

    $sql = "INSERT INTO user (nom, prenom, email, adresse, numTel, sexe, motPasse) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connexionDB->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $numTel, $sexe, $motPasse]);

    if ($stmt->execute()) {
        $userAjoute = "<div class='alert alert-success'>Utilisateur ajouté avec succès.</div>";
        redirectToUrl('listeUser.php');
    } 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Utilisateur</title>
    <style>
                /* Style général pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
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
            max-width: 500px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Titre de la page */
        h2 {
            font-size: 24px;
            color: #124559;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Champs de formulaire */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #124559;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus {
            border-color: #124559;
            outline: none;
        }

        /* Bouton d'ajout d'utilisateur */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #ffffff;
            background-color: #124559;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0e2e3b;
        }

        /* Alertes de réussite et d'erreur */
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .alert-success {
            color: #ffffff;
            background-color: #124559;
        }

        .alert-danger {
            color: #ffffff;
            background-color: #ff0000;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Ajouter un Utilisateur</h2><br>
        <?php if(!empty($userAjoute)){
            echo $userAjoute;
        }
        else {
            echo "<div class='alert alert-danger'>Erreur lors de l'ajout de l'utilisateur.</div>";
            }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="numTel">Numéro de Téléphone</label>
                <input type="text" name="numTel" id="numTel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe" class="form-control" required>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="motPasse">Mot de Passe</label>
                <input type="password" name="motPasse" id="motPasse" class="form-control" required>
            </div>
            <button type="submit" name="ajouterUtilisateur" class="btn btn-custom">Ajouter Utilisateur</button>
        </form>
    </div>
</body>
</html>
