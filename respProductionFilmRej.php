<?php
session_start();
require_once("bd/dbconnect.php"); // Connexion à la base de données

// Requête pour récupérer les films rejetés
$query = "SELECT * FROM films_rejetes"; 
$stmt = $connexionDB->query($query);
$filmsRejetes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Films Rejetés</title>
    <style>
        /* Styles de base */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f4e8;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            background-color: #fff;
            padding: 30px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #e74c3c; /* Couleur rouge pour indiquer le rejet */
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2980b9; /* Bleu */
            color: white;
        }
        button {
            padding: 8px 14px;
            background-color: #e67e22; /* Orange */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        img {
            width: 100px;
            border-radius: 8px;
        }
        .description {
            color: #2ecc71; /* Vert */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Films Rejetés</h1>
    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Fichier</th>
        </tr>
        <?php foreach ($filmsRejetes as $film): ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($film['image']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>"></td>
                <td><?php echo htmlspecialchars($film['titre']); ?></td>
                <td class="description"><?php echo htmlspecialchars($film['description']); ?></td>
                <td><a href="<?php echo htmlspecialchars($film['fichier']); ?>" target="_blank">Voir le fichier</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
