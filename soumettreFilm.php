<?php
session_start();
require_once("bd/dbconnect.php"); // Fichier PHP contenant la connexion à votre BDD

// Vérification si le formulaire est soumis
if (isset($_POST['soumission'])) {
    // Récupération des données du formulaire
    $titreFilm = htmlspecialchars($_POST['filmTitle']);
    $description = htmlspecialchars($_POST['filmDescription']);
    $duree = htmlspecialchars($_POST['filmDuration']);
    $nomRealisateur = htmlspecialchars($_POST['nomRealisateur']);
    $nomProducteur = htmlspecialchars($_POST['nomProducteur']);
    $contactProducteur = htmlspecialchars($_POST['producerEmail']); // Utiliser l'email du producteur
    $telephoneProducteur = htmlspecialchars($_POST['producerPhone']); // Utiliser le téléphone du producteur
    $idUser = $_SESSION['LOGIN_USER']['user_id']; // ID de l'utilisateur connecté
    $dateSoumission = date("Y-m-d H:i:s"); // Date actuelle

    // Gestion du fichier de l'affiche
    $afficheFilm = '';
    if (isset($_FILES['filmPoster']) && $_FILES['filmPoster']['error'] == 0) {
        $targetDir = "uploads/affiches/";
        $afficheFilm = $targetDir . basename($_FILES['filmPoster']['name']);
        if (!move_uploaded_file($_FILES['filmPoster']['tmp_name'], $afficheFilm)) {
            die("Erreur lors de l'upload de l'affiche.");
        }
    }

    // Gestion du fichier du film
    $fichierFilm = '';
    if (isset($_FILES['filmFile']) && $_FILES['filmFile']['error'] == 0) {
        $targetDirFilm = "uploads/fichiersFilms/";
        $fichierFilm = $targetDirFilm . basename($_FILES['filmFile']['name']);
        if (!move_uploaded_file($_FILES['filmFile']['tmp_name'], $fichierFilm)) {
            die("Erreur lors de l'upload du fichier du film.");
        }
    }

    try {
        // Préparation de la requête SQL pour insérer les données dans la table soumission_film
        $sql = "INSERT INTO soumissionfilm (titreFilm, descriptionFilm, dureeFilm, fichierFilm, afficheFilm, nomRealisateur, nomProducteur, emailProducteur, telephoneProducteur, dateSoumission, userId) 
                VALUES (:titreFilm, :description, :duree, :fichierFilm, :afficheFilm, :nomRealisateur, :nomProducteur, :emailProducteur, :telephoneProducteur, :dateSoumission, :idUser)";
        
        // Exécution de la requête préparée
        $stmt = $connexionDB->prepare($sql);
        $stmt->execute([
            ':titreFilm' => $titreFilm,
            ':description' => $description,
            ':duree' => $duree,
            ':fichierFilm' => $fichierFilm,
            ':afficheFilm' => $afficheFilm,
            ':nomRealisateur' => $nomRealisateur,
            ':nomProducteur' => $nomProducteur,
            ':emailProducteur' => $contactProducteur, // Utiliser l'email du producteur
            ':telephoneProducteur' => $telephoneProducteur, // Utiliser le téléphone du producteur
            ':dateSoumission' => $dateSoumission,
            ':idUser' => $idUser // ID de l'utilisateur qui soumet
        ]);

        // Redirection après la soumission (ou affichage d'un message de succès)
        header("Location: index.php?success=1");
        exit();
    } catch (PDOException $e) {
        // Afficher l'erreur
        die("Erreur de requête SQL : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soumission de Film - Producteurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            font-family: 'Ubuntu', sans-serif;
        }

        .submission-form {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 15px;
            width: 80%;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }

        .submission-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--secondary-color);
        }

        .form-header p {
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .form-step {
            margin-bottom: 2rem;
        }

        .form-step label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .form-step input, .form-step textarea {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.8rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-step input:focus, .form-step textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
        }

        .btn-submit {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            border: none;
            border-radius: 30px;
            padding: 1rem 2rem;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: block;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-submit:hover::after {
            left: 100%;
        }

        .animated {
            animation: slideIn 0.5s ease forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="submission-form animated">
            <div class="form-header">
                <h1>Soumettre un film</h1>
                <p>Complétez les informations nécessaires pour soumettre votre film au festival.</p>
            </div>

            <form id="filmSubmissionForm" action="" method="POST" enctype="multipart/form-data">
                <!-- Étape 1: Détails du Film -->
                <div class="form-step">
                    <label for="filmTitle">Titre du Film</label>
                    <input type="text" id="filmTitle" name="filmTitle" placeholder="Entrez le titre du film" required>
                </div>

                <div class="form-step">
                    <label for="filmDescription">Description</label>
                    <textarea id="filmDescription" name="filmDescription" rows="4" placeholder="Entrez une brève description du film" required></textarea>
                </div>

                <div class="form-step">
                    <label for="filmDuration">Durée (en minutes)</label>
                    <input type="number" id="filmDuration" name="filmDuration" min="1" placeholder="Durée du film" required>
                </div>

                <!-- Étape 2: Informations sur le Producteur -->
                <div class="form-step">
                    <label for="nomRealisateur">Nom du Réalisateur</label>
                    <input type="text" id="nomRealisateur" name="nomRealisateur" placeholder="Entrez le nom du réalisateur" required>
                </div>

                <div class="form-step">
                    <label for="nomProducteur">Nom du Producteur</label>
                    <input type="text" id="nomProducteur" name="nomProducteur" placeholder="Entrez le nom du producteur" required>
                </div>

                <div class="form-step">
                    <label for="producerEmail">Email du Producteur</label>
                    <input type="email" id="producerEmail" name="producerEmail" placeholder="Email du producteur" required>
                </div>

                <div class="form-step">
                    <label for="producerPhone">Téléphone du Producteur</label>
                    <input type="tel" id="producerPhone" name="producerPhone" placeholder="Téléphone du producteur" required>
                </div>

                <!-- Étape 3: Upload des fichiers -->
                <div class="form-step">
                    <label for="filmPoster">Affiche du Film</label>
                    <input type="file" id="filmPoster" name="filmPoster" accept=".jpg, .jpeg, .png" required>
                </div>

                <div class="form-step">
                    <label for="filmFile">Fichier du Film</label>
                    <input type="file" id="filmFile" name="filmFile" accept=".mp4, .avi, .mov" required>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" name="soumission" class="btn-submit">Soumettre le Film</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
