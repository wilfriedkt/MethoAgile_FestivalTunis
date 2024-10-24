<?php
session_start();
require_once('fonction.php');

if (isset($_SESSION['LOGIN_USER'])){
    session_destroy();   
}

redirectToUrl('index.php');
?>