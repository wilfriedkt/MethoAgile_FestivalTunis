<div class="bg-header">

                <div class="row m-0 align-items-center d-flex justify-content-between bgcolor-2 bg-transp">

                    <div class="col-4 col-md-3 p-0 m-auto">
                        <a class="navbar-brand pr-0 pl-2 mr-0" href="index.html">
                            <img class="img-fluid" src="img/logo.png" alt="Les Films de Plein Air">
                        </a>
                    </div>
                    <div class="col text-center p-0 pl-2">
                        <p class="h1 mb-0 text-nowrap">Du <span>22</span> au <span>29</span> octobre <span class="entrelace"><span>2</span><span>0</span><span>2</span><span>4</span></span></p>
                        <p class="h2">4 jours / 12 films</p>
                        <p class="h5 font-italic">à Tunis</p>
                        <p class="my-2"></p>
                            <a href="<?php if (!isset($_SESSION['LOGIN_USER'])) { echo 'connexion.php'; } else { echo 'soumettreFilm.php'; } ?>" class="btn w-75 bgcolor-4" style="color: white;">Soumettre un film</a>
                        </p>
                        
                    </div>
                    <div class="col-12 col-sm-2 col-lg-4 text-center p-0">
                        <p class="d-none d-lg-block h4"><span class="text-uppercase font-weight-bold">Réservez</span><br>
                        votre place dès maintenant !</p> 
                        <p class="my-2">
                            <a href="<?php if (!isset($_SESSION['LOGIN_USER'])) { echo 'connexion.php'; } else { echo 'achatBillet.php'; } ?>" class="btn w-75 bgcolor-2">Acheter un billet</a>
                        </p>
                        <div class="d-lg-none justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i><span class="d-none d-sm-inline"><br>MENU</span>
                            </button>
                        </div>
                    </div>

                    <nav class="navbar navbar-expand-lg navbar-collapse py-0 mt-3">
                        <div class="row collapse navbar-collapse" id="navbarContent">
                            <ul class="col-12 col-lg-8 navbar-nav justify-content-around pr-0">
                                <li class="nav-item w-100 text-center mr-lg-1 mb-1 mb-lg-0 active1">
                                    <a class="nav-link streched-link rounded-top bgcolor-1 bg-transp" href="index.php">le festival 2024</a>
                                </li>
                                <li class="nav-item w-100 text-center mr-lg-1 mb-1 mb-lg-0 active2">
                                    <a class="nav-link streched-link rounded-top bgcolor-1 bg-transp" href="actualites.php">Actualités</a>
                                </li>
                                <li class="nav-item w-100 text-center mr-lg-1 mb-1 mb-lg-0 active3">
                                    <a class="nav-link streched-link rounded-top bgcolor-1 bg-transp" href="espace-pro.php">Espace pro</a>
                                </li>
                                <li class="nav-item w-100 text-center mr-lg-1 mb-1 mb-lg-0 active4">
                                    <a class="nav-link streched-link rounded-top bgcolor-1 bg-transp" href="a-propos.php">A propos</a>
                                </li>
                                <li class="nav-item dropdown w-100 text-center mr-lg-1 mb-1 mb-lg-0 active5">
                                    <a class="nav-link dropdown-toggle stretched-link rounded-top bgcolor-1 bg-transp" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Mon compte
                                    </a>
                                    <div class="dropdown-menu text-center rounded-top bg-transp" aria-labelledby="navbarDropdown">
                                        <?php if (!isset($_SESSION['LOGIN_USER'])) : ?>
                                            <a class="dropdown-item" href="connexion.php">Se connecter</a>
                                        <a class="dropdown-item" href="inscription.php">S'inscrire</a>

                                        <?php else : ?>
                                        <a class="dropdown-item" href="#">Mes informations</a>
                                        <a class="dropdown-item" href="deconnexion.php">Déconnexion</a>
                                    </div>
                                </li>
                                <?php endif ?>
                                
                            </ul>
                            <ul class="social-nav col navbar-nav flex-row justify-content-center justify-content-lg-end pr-0">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white px-3 px-lg-2 py-lg-0">
                                        <span class="sr-only">Facebook</span>
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white px-3 px-lg-2 py-lg-0">
                                        <span class="sr-only">Twitter</span>
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white px-3 px-lg-2 py-lg-0">
                                        <span class="sr-only">LinkedIn</span>
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- /.navbar -->

                </div> <!-- /.bg-header > div -->

</div> <!-- /.bg-header -->

            <div id="title" class="d-lg-none text-center bgcolor-1">
                <h1 class="h4 p-1">
                    Le festival 2024<br>
                    <span class="small font-italic">Réservez votre place dès maintenant !</span>
                </h1>
            </div> <!-- /#title -->