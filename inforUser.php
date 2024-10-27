<?php
session_start();
require_once("bd/dbconnect.php");  // connection bd
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['LOGIN_USER']['user_id'])) {
    redirectToUrl('connexion.php'); 
}

$userId = $_SESSION['LOGIN_USER']['user_id']; // Récupérer l'ID de l'utilisateur à partir de la session

// Récupération des informations de l'utilisateur
$stmt = $connexionDB->prepare("SELECT * FROM user WHERE idUser = :id");
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Aucun utilisateur trouvé.";
    exit();
}

// Gestion de la soumission du formulaire de modification
if (isset($_POST['modifierInfoPersonnelle'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $numTel = htmlspecialchars($_POST['numTel']);
    $sexe = htmlspecialchars($_POST['sexe']);
    
    // Mettre à jour les informations dans la base de données
    $updateStmt = $connexionDB->prepare("UPDATE user SET nom = ?, prenom = ?, email = ?, adresse = ?, numTel = ?, sexe = ? WHERE idUser = ?");
    $updateStmt->execute([$nom, $prenom, $email, $adresse, $numTel, $sexe, $userId]);

    // Rediriger vers la même page pour voir les modifications
    redirectToUrl('inforUser.php'); 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body {
    background-color: #e9ecef; /* Couleur de fond douce */
    font-family: 'Arial', sans-serif; /* Police moderne */
}

.container {
    max-width: 600px; /* Largeur maximale pour la présentation */
    margin: 50px auto; /* Centrer la container */
    padding: 30px; /* Espacement intérieur */
    background-color: #ffffff; /* Couleur de fond de la carte */
    border-radius: 15px; /* Coins arrondis */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Ombre douce pour effet de profondeur */
}

h2, h3 {
    color: #124559; /* Titre en bleu foncé */
    text-align: center; /* Centrer les titres */
    margin-bottom: 20px; /* Espacement sous les titres */
}

.card {
    padding: 20px;
    margin-bottom: 20px; /* Espacement entre les cartes */
    border-radius: 10px; /* Coins arrondis */
    background-color: #f8f9fa; /* Couleur de fond des cartes */
    border: 1px solid #dee2e6; /* Bordure légère */
    transition: box-shadow 0.3s ease; /* Transition douce pour l'effet au survol */
}

.card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Ombre plus intense au survol */
}

.card-title {
    font-size: 1.5rem; /* Taille du titre */
    color: #ff0000; /* Couleur rouge pour le titre */
    margin-bottom: 10px; /* Espacement sous le titre */
}

.card-text {
    font-size: 1rem; /* Taille de texte */
    color: #495057; /* Couleur de texte pour le contenu */
}

.btn-custom {
    background-color: #ff0000; /* Couleur du bouton en rouge */
    color: white;
    border-radius: 25px; /* Coins arrondis pour le bouton */
    padding: 10px 20px; /* Espacement interne du bouton */
    font-size: 1rem; /* Taille du texte du bouton */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transition douce pour le bouton */
}

.btn-custom:hover {
    background-color: #124559; /* Couleur au survol en bleu foncé */
    transform: scale(1.05); /* Légère augmentation de la taille au survol */
}

.form-group label {
    font-weight: bold; /* Mettre les étiquettes en gras */
    color: #124559; /* Couleur des étiquettes en bleu foncé */
}

.form-control {
    border: 1px solid #ced4da; /* Bordure légère pour les champs de saisie */
    border-radius: 5px; /* Coins arrondis pour les champs */
    padding: 10px; /* Espacement interne des champs */
    transition: border-color 0.3s ease; /* Transition douce pour la bordure */
}

.form-control:focus {
    border-color: #ff0000; /* Couleur de la bordure au focus en rouge */
    box-shadow: 0 0 5px rgba(255, 0, 0, 0.5); /* Ombre au focus */
}

    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Mes Informations Personnelles</h2>
        
        <div class="card">
            <h5 class="card-title"><?php echo htmlspecialchars($user['prenom']) . ' ' . htmlspecialchars($user['nom']); ?></h5>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p class="card-text"><strong>Adresse:</strong> <?php echo htmlspecialchars($user['adresse']); ?></p>
            <p class="card-text"><strong>Téléphone:</strong> <?php echo htmlspecialchars($user['numTel']); ?></p>
            <p class="card-text"><strong>Sexe:</strong> <?php echo htmlspecialchars($user['sexe']); ?></p>
        </div>

        <h3 class="text-center">Modifier Mes Informations</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo htmlspecialchars($user['adresse']); ?>" required>
            </div>
            <div class="form-group">
                <label for="numTel">Numéro de Téléphone</label>
                <input type="tel" class="form-control" id="numTel" name="numTel" value="<?php echo htmlspecialchars($user['numTel']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select class="form-control" id="sexe" name="sexe" required>
                    <option value="Homme" <?php if ($user['sexe'] === 'Homme') echo 'selected'; ?>>Homme</option>
                    <option value="Femme" <?php if ($user['sexe'] === 'Femme') echo 'selected'; ?>>Femme</option>
                </select>
            </div>
            <button type="submit" name="modifierInfoPersonnelle" class="btn btn-custom w-100">Enregistrer les modifications</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
