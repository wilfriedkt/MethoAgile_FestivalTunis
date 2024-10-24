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

    <title>Réservations ouvertes - Actualités - Les Films de Plein Air</title>

    <style>
        nav .active1 a[class*='bgcolor-'] {
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

            <p>
                <a href="actualites.html" class="text-muted">
                    <i class="fas fa-arrow-left pr-2"></i>Retour à la liste
                </a>
            </p>

            <article id="actu">
                
                <h1 class="h2 position-relative border-bottom pr-5 mb-4">
                    Réservations ouvertes <small class="text-muted">- 8/12/20</small>
                    <a id="share" class="btn bgcolor-3 position-absolute pb-1 pt-0">
                        <span class="d-none d-md-inline font-italic pr-1 small">partager </span><i class="fas fa-share-alt align-text-top mb-0"></i>
                    </a>
                </h1>

                <div id="actu-content">

                    <div class="m-2">
                        <img src="img/photos/public2.jpg" alt="cinéma en plein air" class="img-responsive float-left col-12 col-sm-6 mr-sm-2 mb-2 mt-0 ml-0">
                        <p class="lead">
                            Le coup d'envoi est donné pour les réservations du festival Les Films de Plein Air 2021. Réservez en ligne dès à présent.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor recusandae maxime officiis at blanditiis eos beatae repellat rerum nihil harum voluptas possimus quasi ratione, <a href="#">architecto aliquam molestias</a> fugiat accusamus laborum perspiciatis necessitatibus? Hic quis ea, corporis adipisci aliquam debitis quia, neque quasi accusantium qui, nesciunt facere placeat deserunt? Tempore, quae!
                        </p>
                        <p>
                            Provident vel, a rem atque aperiam possimus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium deleniti totam esse vitae unde sint? Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, harum.
                        </p>
                        <blockquote class="blockquote text-center mx-5">
                            <p class="mb-0 font-italic">&laquo; Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto illum veritatis alias ex maxime deserunt dignissimos, quaerat ut assumenda! Non. &raquo;
                            </p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, nam similique. Ipsam sequi, numquam doloremque est iste sunt perferendis natus similique necessitatibus nihil quaerat magnam? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure perferendis inventore voluptate odio et dolore esse fugit fuga, similique repudiandae unde ad voluptates expedita impedit repellat magnam odit. Unde laborum voluptate alias.
                        </p>
                        <p class="ml-2 font-italic">Par Jennifer Edwards</p>
                    </div>

                </div> <!-- /#actu-content -->
            
            </article> <!-- /#actu -->

            <section id="actualites" class="border-top mt-5">
                <h2 class="d-none">Derniers articles</h2>
                <div class="row py-2">
                    <article class="card col-lg-6 border-0 pb-4 justify-content-between">
                        <h3 class="card-title"><a href="article.html" class="color-2">Réservations ouvertes <span class="small">- 8/12/20</span></a></h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="article.html">
                                    <img src="img/photos/public2.jpg" alt="cinéma en plein air" class="card-img">
                                </a>
                            </div>
                            <div class="col d-flex flex-column justify-content-between">
                                <div>
                                    <p>Le coup d'envoi est donné pour les réservations du festival Les Films de Plein Air 2021. Réservez en ligne dès à présent.</p>
                                </div>
                                <div>
                                    <p class="mb-0">
                                        <a href="article.html" class="card-link bgcolor-5 p-1 px-2 rounded"><i class="fas fa-chevron-circle-right"></i> Lire l'article</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article> <!-- /.card -->
                    <hr class="w-100 d-lg-none">
                    <article class="card col-lg-6 border-0 pb-4 justify-content-between">
                        <h3 class="card-title"><a href="article.html" class="color-2">Un cadre idéal pour le festival <span class="small">- 5/12/20</span></a></h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="article.html">
                                    <img src="img/photos/public3.jpg" alt="cinéma en plein air" class="card-img">
                                </a>
                            </div>
                            <div class="col d-flex flex-column justify-content-between">
                                <div>
                                    <p>C'est le Parc Monceau, au cœur du 8<sup>ème</sup> arrondissement de Paris, qui accueillera le festival des Films de Plein Air cet été.</p>
                                </div>
                                <div>
                                    <p class="mb-0">
                                        <a href="article.html" class="card-link bgcolor-5 p-1 px-2 rounded"><i class="fas fa-chevron-circle-right"></i> Lire l'article</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article> <!-- /.card -->
                </div>
                <div class="text-center">
                    <a href="actualites.html" class="color-3 font-weight-bold"><i class="fas fa-plus"></i> Voir plus d'actualités</a>
                </div>
            </section> <!-- /#actualites -->

        </div> <!-- /#content -->

        <?php include('footer.php') ?>
        
    </div> <!-- /.container-md -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>