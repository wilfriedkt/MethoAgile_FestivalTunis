<?php
session_start(); // Démarrer la session

require_once("bd/dbconnect.php"); // Connexion à la base de données

// Récupérer les films soumis avec statut 'en attente'
$query = "SELECT * FROM soumissionfilm WHERE userId = ? AND statut = 'en attente'"; // Filtrer par l'utilisateur connecté et par statut
$stmt = $connexionDB->prepare($query);
$stmt->execute([$_SESSION['LOGIN_USER']['user_id']]);
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Traiter la validation ou le rejet d'un film
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filmId = $_POST['film_id'];
    $action = $_POST['action']; // 'valider' ou 'rejeter'
    
    try {
        if ($action === 'valider') {
            // Mettre à jour le statut du film à 'validé'
            $updateQuery = "UPDATE soumissionfilm SET statut = 'validé' WHERE idFilm = ?";
            $updateStmt = $connexionDB->prepare($updateQuery);
            $updateStmt->execute([$filmId]);
        } elseif ($action === 'rejeter') {
            // Mettre à jour le statut du film à 'rejetté'
            $updateQuery = "UPDATE soumissionfilm SET statut = 'rejetté' WHERE idFilm = ?";
            $updateStmt = $connexionDB->prepare($updateQuery);
            $updateStmt->execute([$filmId]);
        }
        
        // Redirection pour éviter la soumission multiple du formulaire
        header('Location: responsable_production.php');
        exit();
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Espace Responsable de Production</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
        }
        h1 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #27ae60;
            color: white;
        }
        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .valider {
            background-color: #2ecc71;
            color: white;
        }
        .rejeter {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Espace Responsable de Production</h1>
    
    <h2>Films Soumis</h2>
    <table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($films as $film): ?>
        <tr>
            <td><?php echo htmlspecialchars($film['titreFilm']); ?></td>
            <td><?php echo htmlspecialchars($film['descriptionFilm']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="film_id" value="<?php echo $film['idFilm']; ?>">
                    <button type="submit" name="action" value="valider" class="valider">Valider</button>
                    <button type="submit" name="action" value="rejeter" class="rejeter">Rejeter</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
