<?php

$host    = 'localhost';  // nom de l'host  
$name    = 'festival_tunis';    // nom de la base de donnée
$user    = 'root';       // utilisateur 
$pass    = '';       // mot de passe ('' sous Windows)


try {
    $connexionDB = new PDO("mysql:host=$host;dbname=$name", $user, $pass);

    // Configuration des attributs PDO pour afficher les erreurs
    $connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie!";
} catch (PDOException $e) {
    // En cas d'échec de la connexion, afficher l'erreur
    // echo "Échec de la connexion : " . 
    $e->getMessage();
}


/*try {
    $dsn = 'mysql:host=localhost;dbname=2kboutique';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}*/
