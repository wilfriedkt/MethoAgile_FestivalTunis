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

    <title>A propos - Les Films de Plein Air</title>

    <style>
        nav .active4 a[class*='bgcolor-'] {
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

            <article id="a-propos">
                
                <h1 class="h2 position-relative border-bottom pr-5 mb-4">
                    A propos du Festival International des Films Documentaires En Tunisie                    
                </h1>

                <div id="a-propos-content">

                    <div class="m-2">

                        <img src="img/logo.png" alt="logo Les films de plein air" class="img-responsive float-left col-12 col-sm-6 mr-sm-2 mb-2 mt-0 ml-0">
                        <h2 class="h4">Notre histoire et notre raison d'être</h2>
                        <p class="lead">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore esse blanditiis nihil itaque facilis voluptatibus, exercitationem.
                        </p>
                        <p>
                            Adipisicing elit. Dolor recusandae maxime officiis at blanditiis eos beatae repellat rerum nihil harum voluptas possimus quasi ratione, <a href="#">architecto aliquam molestias</a> fugiat accusamus laborum perspiciatis necessitatibus? Hic quis ea, corporis adipisci aliquam debitis quia, neque quasi accusantium qui, nesciunt facere placeat deserunt? Tempore, quae!
                        </p>
                        <p>
                            Provident vel, a rem atque aperiam possimus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium deleniti totam esse vitae unde sint? Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, harum.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, nam similique. Ipsam sequi, numquam doloremque est iste sunt perferendis natus similique necessitatibus nihil quaerat magnam? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure perferendis inventore voluptate odio et dolore esse fugit fuga, similique repudiandae unde ad voluptates expedita impedit repellat magnam odit. Unde laborum voluptate alias.
                        </p>

                        <h2 class="h4">Notre organisation</h2>
                        <p>Suscipit recusandae commodi consequatur, cum dolorum quam veritatis, sint, quasi accusamus delectus quia inventore! Eum a et reiciendis vitae ratione deleniti est architecto. Iste adipisci quis cumque suscipit?</p>
                        <div class="row justify-content-around">
                            <figure class="col-sm-4 figure text-center">
                                <img class="figure-img img-fluid rounded-circle my-2" style="max-width: 50%;" src="img/membres/jennifer.jpg" alt="Jennifer Edwards">
                                <figcaption class="figure-caption"><strong>Jennifer Edwards</strong><br>Présidente co-fondatrice</figcaption>
                            </figure>
                            <figure class="col-sm-4 figure text-center">
                                <img class="figure-img img-fluid rounded-circle my-2" style="max-width: 50%;" src="img/membres/nathalie.jpg" alt="Nathalie Faure">
                                <figcaption class="figure-caption"><strong>Nathalie Faure</strong><br>Vice-présidente co-fondatrice,</figcaption>
                            </figure>
                            <figure class="col-sm-4 figure text-center">
                                <img class="figure-img img-fluid rounded-circle my-2" style="max-width: 50%;" src="img/membres/damien.jpg" alt="Damien Gueret">
                                <figcaption class="figure-caption"><strong>Damien Gueret</strong><br>responsable communication</figcaption>
                            </figure>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ex corrupti doloremque ea officiis eaque quo facere in temporibus? Animi quo voluptates exercitationem quasi? Suscipit voluptatibus architecto atque dolorem ab.</p>

                        <h3 class="h5">Siège</h3>
                        <p>4 Rue d'Argenson, 75008 Paris</p>
                        <p>Pour nous contacter, rendez-vous dans la rubrique <a href="espace-pro.html" class="btn bgcolor-2">Espace pro</a></p>
                        
                    </div>

                </div> <!-- /#a-propos-content -->
            
            </article> <!-- /#a-propos -->

        </div> <!-- /#content -->

        <?php include('footer.php') ?>
        
    </div> <!-- /.container-md -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>