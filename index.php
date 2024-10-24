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
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/accueil.css">

    <title>Doc à Tunis</title>
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
        
        <div id="content" class="px-4 pt-1 pb-4 pt-sm-3 pt-lg-4">

            <!-- DEBUT SECTION PROGRAMME -->

            <section id="programme" class="container-fluid p-0">
                <h2 class="h3 text-center text-uppercase color-2 bgcolor-4 rounded-top mt-4 mb-3 position-relative">
                    programme
                    <img src="img/silhouette-famille-assise.png" alt="" class="position-absolute d-none d-sm-block">
                </h2>
                <div id="carouselSeances" class="carousel slide p-3" data-ride="carousel" data-interval="4000">
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner row w-100 mx-auto">
                        <div class="carousel-item col-12 col-md-4 px-4 active">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Jeudi 22 octobre <span class="d-none d-lg-inline">2024<br></span>à 18H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Dilili à Paris - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/1-dilili-a-paris.jpg" class="card-img-top" alt="Dilili à Paris"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Jeudi 22 octobre <span class="d-none d-lg-inline">2024<br></span>à 20H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Le Goût des Autres - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/2-Le-gout-des-autres.jpg" class="card-img-top" alt="Le Goût des Autres"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Jeudi 23 octobre <span class="d-none d-lg-inline">2024<br></span>à 22H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">The Grand Budapest Hotel - VOST</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/3-the_grand_budapest_hotel.jpg" class="card-img-top" alt="The Grand Budapest Hotel"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Vendredi 24 octobre <span class="d-none d-lg-inline">2024<br></span>à 18H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Shaun le Mouton, le film - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/4-shaun-le-mouton.jpg" class="card-img-top" alt="Shaun le Mouton, le film"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Vendredi 25 octobre <span class="d-none d-lg-inline">2024<br></span>à 20H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Adieu les Cons - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/5-Adieu-les-cons.jpg" class="card-img-top" alt="Adieu les Cons"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Vendredi 26 octobre <span class="d-none d-lg-inline">2024<br></span>à 22H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Cinema Paradiso - VOST</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/6-Cinema_Paradiso.jpg" class="card-img-top" alt="Cinema Paradiso"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Samedi 27 octobre <span class="d-none d-lg-inline">2024<br></span>à 18H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Le Château Ambulant - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/7-Le-chateau-ambulant.jpg" class="card-img-top" alt="Le Château Ambulant"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Samedi 27 octobre <span class="d-none d-lg-inline">2024<br></span>à 20H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Juno - VOST</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/8-Juno.jpg" class="card-img-top" alt="Juno"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Samedi 28 octobre <span class="d-none d-lg-inline">2024<br></span>à 22H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">La Science des Rêves - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/9-La-science-des-reves.jpg" class="card-img-top" alt="..."></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Dimanche 28 octobre <span class="d-none d-lg-inline">2024<br></span>à 18H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Le Grand Méchant Renard - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/10-Le-grand-mechant-renard.jpg" class="card-img-top" alt="Le Grand Méchant Renard"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Dimanche 29 octobre <span class="d-none d-lg-inline">2024<br></span>à 20H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Persepolis - VF</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/11-Persepolis.jpg" class="card-img-top" alt="Persepolis"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                        <div class="carousel-item col-12 col-md-4 px-4">
                            <div class="seance h-100 text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title h4">Dimanche 29 octobre <span class="d-none d-lg-inline">2024<br></span>à 22H</h3>
                                    <h4 class="card-subtitle mb-2 text-muted h5 d-flex align-items-center justify-content-center">Looking For Eric - VOST</h4>
                                </div>
                                <div>
                                    <a href="seance.html"><img src="img/films/12-Looking-for-Eric.jpg" class="card-img-top" alt="Looking For Eric"></a>
                                    <p class="my-2">
                                        <a href="seance.html" class="btn w-75 bgcolor-3">En savoir plus</a>
                                    </p>
                                    <p class="my-2">
                                        <a href="seance.html#reservation" class="btn w-75 bgcolor-2">J'achete mon billet</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /.carousel-item -->
                    </div> <!-- /.carousel-inner -->
                    <a class="carousel-control-prev" href="#carouselSeances" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselSeances" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div> <!-- /#carouselSeances -->
            </section> <!-- /#programme -->

            <!-- DEBUT SECTION INFOS PRATIQUES -->

            <section id="infos">
                <h2 class="h3 text-center text-uppercase color-2 bgcolor-4 rounded-top mt-5 mb-4 position-relative">
                    infos pratiques
                    <img src="img/silhouette-famille-assise-2.png" alt="" class="position-absolute d-none d-sm-block">
                </h2>
                <div class="row py-2">
                    <div class="col-12 col-sm-6 col-md-7 row row-cols-2">
                        <div class="col-12 col-md-6 d-flex align-items-baseline">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <p>
                                <span class="font-weight-bold">Parc Monceau</span><br>
                                35, boulevard de Courcelles<br>
                                75008 PARIS<br>
                                <span class="font-italic d-block small mt-2">Accès gratuit par boulevard de Courcelles, avenue Vélasquez, avenue Van Dyck ou avenue Ruysdael.</span>                                
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex align-items-baseline">
                                <i class="fas fa-subway mr-2 text-center" style="width:20px;"></i>
                                <p>
                                    Métro Monceau, ligne 2
                                </p>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <i class="fas fa-bicycle mr-2"></i>
                                <p> 
                                    Station 17018, 4 rue de thann<br>
                                    Station 8036, 39 rue de lisbonne<br>
                                    Station 8044, 2 rue alfred de vigny
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 map p-0 m-0">
                        <a class="d-block h-100" href="https://www.google.fr/maps/place/Parc+Monceau/@48.8796835,2.3067663,17z/data=!3m1!4b1!4m5!3m4!1s0x47e66fbe98f714c3:0xe62425fddeddc402!8m2!3d48.8796835!4d2.308955!5m1!1e2">
                        </a>
                    </div>
                </div>
            </section> <!-- /#infos -->

            <section id="actualites">
                <h2 class="h3 text-center text-uppercase color-2 bgcolor-4 rounded-top mt-5 mb-4 position-relative">
                    actualités
                    <img src="img/silhouette-personnes-assises.png" alt="" class="position-absolute d-none d-sm-block">
                </h2>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="js/carousel.js"></script>

</body>
</html>