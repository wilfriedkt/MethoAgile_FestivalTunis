<?php

session_start(); // Démarrer la session
require_once("bd/dbconnect.php");  // connection à la base de données
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()

// Validation d'un film
if (isset($_POST['valider'])) {
    $id_film = $_POST['id_film'];

    // Récupération des détails du film à partir de la table soumissionfilm
    $query = $connexionDB->prepare("SELECT * FROM soumissionfilm WHERE idFilm = ?");
    $query->execute([$id_film]);
    $film = $query->fetch(PDO::FETCH_ASSOC);

    if ($film) {
        // Insertion du film dans la table films_retenus
        $stmt = $connexionDB->prepare("INSERT INTO films_retenus (titre, description, image, fichier) VALUES (:titre, :description, :image, :fichier)");
        $stmt->execute([
            'titre' => $film['titreFilm'],
            'description' => $film['descriptionFilm'],
            'image' => $film['afficheFilm'],
            'fichier' => $film['fichierFilm']
        ]);

        // Suppression du film de la table films
        $stmt = $connexionDB->prepare("DELETE FROM soumissionfilm WHERE idFilm = ?");
        $stmt->execute([$id_film]);
    }

    redirectToUrl('respoProductionFilmS.php'); // Redirection vers la page des films soumis
}

// Rejet d'un film
if (isset($_POST['rejeter'])) {
    $id_film = $_POST['id_film'];

    // Récupération des détails du film à partir de la table films
    $query = $connexionDB->prepare("SELECT * FROM soumissionfilm WHERE idFilm = ?");
    $query->execute([$id_film]);
    $film = $query->fetch(PDO::FETCH_ASSOC);

    if ($film) {
        // Insertion du film dans la table films_rejetes
        $stmt = $connexionDB->prepare("INSERT INTO films_rejetes (titre, description, image, fichier) VALUES (:titre, :description, :image, :fichier)");
        $stmt->execute([
            'titre' => $film['titreFilm'],
            'description' => $film['descriptionFilm'],
            'image' => $film['afficheFilm'],
            'fichier' => $film['fichierFilm']
        ]);

        // Suppression du film de la table films
        $stmt = $connexionDB->prepare("DELETE FROM soumissionfilm WHERE idFilm = ?");
        $stmt->execute([$id_film]);
    }

    redirectToUrl('respoProductionFilmS.php'); // Redirection vers la page des films soumis
}

// Requête pour récupérer les films soumis
$query = "SELECT * FROM soumissionfilm"; 
$stmt = $connexionDB->query($query);
$filmsoumis = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            background-color: #f0f4f8;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 900px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: auto;
        }
        h1 {
            color: #2c3e50;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #34495e;
            font-size: 22px;
            margin-bottom: 15px;
            text-align: center;
        }
        a {
            color: #34495e;
            margin-bottom: 15px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2980b9;
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            max-width: 100px;
            border-radius: 8px;
        }
        button {
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .valider {
            background-color: #27ae60;
            color: white;
        }
        .valider:hover {
            background-color: #2ecc71;
        }
        .rejeter {
            background-color: #e74c3c;
            color: white;
        }
        .rejeter:hover {
            background-color: #c0392b;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        td.actions {
            text-align: center;
        }
        .planifier-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }
        .planifier-btn:hover {
            background-color: #2980b9;
        }

        .rejetes-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #e74c3c;
        color: white;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
    }
    .rejetes-btn:hover {
        background-color: #c0392b;
    }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            table, th, td {
                font-size: 14px;
            }
            button {
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Espace Responsable de Production</h1>
    <!-- Bouton pour aller sur la page de planification des films retenus -->
    <a href="respProductionFlanningfilm.php" class="planifier-btn">Planifier les Films Retenus</a>
    <a href="respProductionFilmRej.php" class="rejetes-btn">Voir les Films Rejetés</a>

    
    <h2>Films Soumis</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Description</th>
            <th>fichier du film</th>
            <th>Actions</th>
        </tr>
        <!-- Affichage dynamique des films soumis -->
        <?php foreach ($filmsoumis as $film): ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($film['afficheFilm']); ?>" alt="<?php echo htmlspecialchars($film['titreFilm']); ?>"></td>
                <td><?php echo htmlspecialchars($film['titreFilm']); ?></td>
                <td><?php echo htmlspecialchars($film['descriptionFilm']); ?></td>
                <td><a href="<?php echo htmlspecialchars($film['fichierFilm']); ?>" target="_blank">Voir le fichier du film</a></td>
                <td class="actions">
                    <div class="action-buttons">
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id_film" value="<?php echo $film['idFilm']; ?>">
                            <button class="valider" name="valider">Valider</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id_film" value="<?php echo $film['idFilm']; ?>">
                            <button class="rejeter" name="rejeter">Rejeter</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
