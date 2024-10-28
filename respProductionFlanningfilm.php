<?php
session_start();
require_once("bd/dbconnect.php"); // Connexion à la base de données
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()

if (isset($_POST['confirmerProjection'])) {
    $id_film = $_POST['id_film'];
    $date_projection = $_POST['date_projection'];
    $heure_projection = $_POST['heure_projection'];
    $lieu_projection = $_POST['lieu_projection'];

    // Insérer les informations de projection dans la table projections
    $stmt = $connexionDB->prepare("INSERT INTO projectionfilm (id, date_projection, heure_projection, lieu_projection) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_film, $date_projection, $heure_projection, $lieu_projection]);

    redirectToUrl('respProductionFlanningfilm.php');
}

// Requête pour récupérer les films retenus
$query = "SELECT * FROM films_retenus ORDER BY date_retenue DESC"; 
$stmt = $connexionDB->query($query);
$filmsRetenus = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Films Retenus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            background-color: #ffffff;
            padding: 30px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        td img {
            width: 100px;
            border-radius: 6px;
        }
        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #e67e22;
        }
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 999;
        }
        .popup-content {
            background-color: #ffffff;
            padding: 20px;
            width: 400px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .popup-content h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #2c3e50;
        }
        .popup-content input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .popup-content button[type="submit"] {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .popup-content button[type="submit"]:hover {
            background-color: #2ecc71;
        }
        .popup-content button[type="button"] {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Films Retenus</h1>
    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Fichier</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($filmsRetenus as $film): ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($film['image']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>"></td>
                <td><?php echo htmlspecialchars($film['titre']); ?></td>
                <td><?php echo htmlspecialchars($film['description']); ?></td>
                <td>
                    <?php if (!empty($film['fichier'])): ?>
                        <a href="<?php echo htmlspecialchars($film['fichier']); ?>" target="_blank" style="color: #e67e22; text-decoration: none;">Voir le fichier</a>
                    <?php else: ?>
                        <span style="color: #999;">Aucun fichier</span>
                    <?php endif; ?>
                </td>
                <td>
                    <button onclick="openPopup(<?php echo $film['id']; ?>)">Planifier la Projection</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <h2>Planifier la Projection</h2>
        <form id="planificationForm" method="POST" action="">
            <input type="hidden" name="id_film" id="filmId">
            <label for="date_projection">Date:</label>
            <input type="date" name="date_projection" required>
            <label for="heure_projection">Heure:</label>
            <input type="time" name="heure_projection" required>
            <label for="lieu_projection">Lieu:</label>
            <input type="text" name="lieu_projection" required placeholder="Lieu de la projection">
            <button type="submit" name="confirmerProjection">Confirmer</button>
            <button type="button" onclick="closePopup()">Annuler</button>
        </form>
    </div>
</div>

<script>
    function openPopup(idFilm) {
        document.getElementById("filmId").value = idFilm;
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>

</body>
</html>
