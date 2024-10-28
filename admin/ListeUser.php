<?php
session_start();
require_once("../bd/dbconnect.php"); // Fichier PHP contenant la connexion à votre BDD

$sql = "SELECT * FROM user";
$stmt = $connexionDB->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir les Utilisateurs</title>
    <style>
        /* Style général pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        /* Conteneur principal */
        .container {
            width: 90%;
            max-width: 900px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Titre de la page */
        h2 {
            color: #124559;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Style des boutons */
        .button-container {
            text-align: left;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: blue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
        }

    
        /* Style de la table */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table thead th {
            background-color: #124559;
            color: #ffffff;
            text-transform: uppercase;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Centrer le texte si aucune donnée n'est trouvée */
        .text-center {
            text-align: center;
            color: #ff0000;
            font-weight: bold;
        }

        /* Police et couleur des lignes */
        .table tbody td {
            font-size: 15px;
            color: #333;
        }

        /* Légère animation au survol */
        .table tbody tr:hover td {
            color: #124559;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 class="text-center">Liste des Utilisateurs</h2><br><br>
        
        <!-- Boutons d'ajout -->
        <div class="button-container">
            <a href="ajouterUser.php" class="btn">Ajouter un utilisateur</a>
            <a href="AjouterResProduction.php" class="btn" style="background-color: orange;">Ajouter un responsable de production</a>
        </div><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Numéro de Téléphone</th>
                    <th>Sexe</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['idUser']); ?></td>
                            <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['adresse']); ?></td>
                            <td><?php echo htmlspecialchars($row['numTel']); ?></td>
                            <td><?php echo htmlspecialchars($row['sexe']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
