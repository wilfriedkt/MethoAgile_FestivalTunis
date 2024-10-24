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
            margin-left: 110px;
            
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

            <form id="filmSubmissionForm" action="traitementSoumiFilm.php" method="POST" enctype="multipart/form-data">
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
                    <input type="number" id="filmDuration" name="filmDuration" placeholder="Durée du film" required>
                </div>

                <!-- Étape 2: Fichier du Film -->
                <div class="form-step">
                    <label for="filmFile">Fichier du Film</label>
                    <input type="file" id="filmFile" name="filmFile" required>
                </div>

                <div class="form-step">
                    <label for="filmPoster">Affiche du Film</label>
                    <input type="file" id="filmPoster" name="filmPoster" accept="image/*" required>
                </div>

                <div class="form-step">
                    <label for="producerName">Nom du Realisateur</label>
                    <input type="text" id="producerName" name="nomRealisateur" placeholder="Entrez votre nom" required>
                </div>
                <!-- Étape 3: Informations Producteur -->
                <div class="form-step">
                    <label for="producerName">Nom du Producteur</label>
                    <input type="text" id="producerName" name="nomProducteur" placeholder="Entrez votre nom" required>
                </div>

                <div class="form-step">
                    <label for="producerEmail">Email (Producteur)</label>
                    <input type="text" id="producerEmail" name="producerEmail" placeholder="Entrez votre email ou numéro de téléphone" required>
                </div>
                <div class="form-step">
                    <label for="producerPhone">Téléphone (Producteur)</label>
                    <input type="tel" id="producerPhone" name="producerPhone" placeholder="Entrez votre email ou numéro de téléphone" required>
                </div>

                <!-- Soumission -->
                <button type="submit" class="btn-submit mt-4" name="soumission">Soumettre le film</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
