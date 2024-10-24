<?php
session_start(); // Démarrer la session

require_once("bd/dbconnect.php"); // Connection à la base de données

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Système de Gestion du Festival International de Tunis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #2c3e50;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #2ecc71;
        }
        .admin-button {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #e74c3c; /* Couleur distincte */
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .admin-button:hover {
            background-color: #c0392b; /* Couleur au survol */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Système de Gestion du Festival International de Tunis</h1>
    <a href="loginResproduction.php" class="button">Espace Responsable de Production</a>
    <a href="president_jury.php" class="button">Espace Président du Jury</a>
    <a href="administrateur.php" class="admin-button">Administrateur de la Plateforme</a> <!-- Nouveau bouton -->
</div>

</body>
</html>
