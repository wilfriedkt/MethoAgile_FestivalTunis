<?php
session_start(); // Démarrer la session

require_once("bd/dbconnect.php");  // connection bd
// Inclure le fichier de connexion à la base de données et les fonctions
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font-Awesome 5 - Brands and Solid -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css" integrity="sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css" integrity="sha512-SazV6tF6Ko4GxhyIZpKoXiKYndqzh7+cqxl9HDH7DGSpjkCN3QLqTAlhJHJnKxu3/2rfCsltzwFC4CmxZE1hPg==" crossorigin="anonymous" />
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 

    <!-- Customized CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/espace-pro.css">

    <title>Espace pro - Les Films de Plein Air</title>

    <style>
        nav .active3 a[class*='bgcolor-'] {
    color: white;
    background-color: #ff0000;
    font-weight: bold;
    }
    </style>
    
  </head>
  <body>

    <div class="container-md p-0 bg-white">
      
        <header id="header">

            <?php require_once('navbar.php') ?>

        </header> <!-- /#header -->
        
        <div id="content" class="px-4 pb-4 pt-3 pt-lg-4">

            <article id="espace-pro">
                
                <h1 class="h2 position-relative border-bottom pr-5 mb-4">
                    Espace dédié aux professionnels
                </h1>

                <div id="pro-content">

                    <div class="m-2">

                        <p class="lead">Journalistes, partenaires, blogueurs, comités d'entreprise... vous trouverez ci-dessous des éléments pour faire connaître le festival.</p>

                        <h2 class="h4">Festival édition 2021</h2>
                        
                        <table class="pro-table table table-striped text-center my-4 border-bottom">
                            <thead>
                              <tr>
                                <th scope="col" class="w-auto">Format</th>
                                <th scope="col" class="text-left w-auto">Nom</th>
                                <th scope="col" class="w-auto">Poids</th>
                                <th scope="col" class="w-auto">Voir</th>
                                <th scope="col" class="w-auto"><span class="d-none d-md-inline">Télécharger</span><span class="d-md-none">Tél.</span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row"><i class="fas fa-file-pdf"></i> <small>PDF</small></th>
                                <td class="text-left">Dossier de presse</td>
                                <td>1 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                              <tr>
                                <th scope="row"><i class="fas fa-file-image"></i> <small>JPG</small></th>
                                <td class="text-left">Affiche du festival 2021</td>
                                <td>4 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                              <tr>
                                <th scope="row"><i class="fas fa-file-pdf"></i> <small>PDF</small></th>
                                <td class="text-left">Affiche du festival 2021</td>
                                <td>5 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                              <tr>
                                <th scope="row"><i class="fas fa-file-archive"></i> <small>ZIP</small></th>
                                <td class="text-left">Photos du Parc Monceau</td>
                                <td>15 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                            </tbody>
                        </table>

                        <h2 class="h4">Association Les Films de Plein Air</h2>

                        <table class="pro-table table table-striped text-center my-4 border-bottom">
                            <thead>
                                <tr>
                                  <th scope="col" class="w-auto">Format</th>
                                  <th scope="col" class="text-left w-auto">Nom</th>
                                  <th scope="col" class="w-auto">Poids</th>
                                  <th scope="col" class="w-auto">Voir</th>
                                  <th scope="col" class="w-auto"><span class="d-none d-md-inline">Télécharger</span><span class="d-md-none">Tél.</span></th>
                                </tr>
                              </thead>
                            <tbody>
                              <tr>
                                <th scope="row"><i class="fas fa-file-image"></i> <small>PNG</small></th>
                                <td class="text-left">Logo Les Films de Plein Air</td>
                                <td>2 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                              <tr>
                                <th scope="row"><i class="fas fa-file-video"></i> <small>MP4</small></th>
                                <td class="text-left">Vidéo de présentation</td>
                                <td>12 Mo</td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#" class="d-block color-3"><i class="fas fa-download"></i></a></td>
                              </tr>
                            </tbody>
                        </table>
                        
                        <h2 class="h4">Contactez-nous</h2>
                        <p class="pt-2">Vous pouvez nous contacter par email en fonction du sujet de votre demande :</p>
                        <ul class="list-unstyled pl-4 border-left">
                            <li>Communication / Presse / Média : <a href="mailto:communication@lesfilmsdepleinair-festival.org">communication@lesfilmsdepleinair-festival.org</a></li>
                            <li>Partenariat / Mécénat : <a href="mailto:partenariat@lesfilmsdepleinair-festival.org">partenariat@lesfilmsdepleinair-festival.org</a></li>
                            <li>Autres (questions, bénévolat, ...) : <a href="mailto:contact@lesfilmsdepleinair-festival.org">contact@lesfilmsdepleinair-festival.org</a></li>
                        </ul>
                        <p>
                            Vous pouvez également nous écrire à l'adresse du siège :
                        </p>
                        <p class="font-italic px-4 py-2" style="font-size: 1.2em;">
                            Association Les Films de Plein Air<br>
                            4 Rue d'Argenson<br>
                            75008 Paris
                        </p>
                    </div>

                </div> <!-- /#pro-content -->
            
            </article> <!-- /#espace-pro -->

        </div> <!-- /#content -->

        <?php include('footer.php') ?>
    </div> <!-- /.container-md -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>