<?php
// Vérifiez si une session est déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

if (isset($_SESSION['LOGIN_USER'])) {
    $_SESSION['email'] = $_SESSION['LOGIN_USER']['email'];
}


?>
