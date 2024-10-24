<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achat de billets - Festival International de Tunis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    
    <style>
        :root {
            --primary-color: #ff0000;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        }
        main {
            margin-left: 50px;
            width: 90%;
        }

        .ticket-form {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .ticket-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: var(--primary-color);
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background: var(--primary-color);
            color: white;
            transform: scale(1.2);
        }

        .step-title {
            font-size: 0.9em;
            color: var(--secondary-color);
            margin-top: 0.5rem;
        }

        .progress-bar-steps {
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #e9ecef;
            z-index: 0;
        }

        .seance-card {
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .seance-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }

        .seance-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(45deg, #fff5f5, white);
        }

        .seance-card.selected::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 10px;
            right: 10px;
            color: var(--primary-color);
        }

        .btn-next {
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
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231,76,60,0.3);
        }

        .btn-next::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-next:hover::after {
            left: 100%;
        }

        /* Animations */
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

        .animated {
            animation: slideIn 0.5s ease forwards;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container-md p-0 bg-white">
        <header id="header">
            <!-- Inclure navbar.php -->
        </header>

        <main class="px-4 py-5">
            <h1 class="h2 text-center text-uppercase color-2 bgcolor-4 rounded-top p-3 mb-5 position-relative">
                Réserver vos places
                <span class="position-absolute" style="top: -15px; right: 20px;">
                    <i class="fas fa-ticket-alt fa-2x text-white"></i>
                </span>
            </h1>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form class="ticket-form" id="ticketForm">
                        <div class="step-indicator">
                            <div class="progress-bar-steps"></div>
                            <div class="step active">
                                <div class="step-number">1</div>
                                <div class="step-title">Film selectionné</div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-title">Informations</div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-title">Paiement</div>
                            </div>
                        </div>

                        <!-- Étape 1: Sélection de la séance -->
                        <div class="form-step active" id="step1">
                            <h3 class="h4 mb-4">Votre film sélectionné</h3>
                            
                            <div class="seance-card selected">
                                <div class="seance-info">
                                    <div class="seance-date">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        Jeudi 22 oct. 18H
                                    </div>
                                    <div class="seance-type">
                                        Film d'animation
                                    </div>
                                </div>
                                <h4>Dilili à Paris</h4>
                                <div>
                                    <a href="seance.html"><img src="img/films/3-the_grand_budapest_hotel.jpg" class="card-img-top" alt="The Grand Budapest Hotel"></a>
                                </div>
                                <p class="text-muted mb-0">
                                    Dans le Paris de la Belle Époque, la petite kanake Dilili mène une enquête...
                                </p>
                                <div class="mt-3">
                                    <span class="badge badge-info mr-2">VF</span>
                                    <span class="badge badge-secondary">1h35</span>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-next" onclick="nextStep(1)">
                                    Continuer
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 2: Informations -->
                        <div class="form-step" id="step2">
                            <h3 class="h4 mb-4">Vos informations</h3>
                            
                            <div class="form-group">
                                <label for="lastname">Nom</label>
                                <input type="text" class="form-control" id="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="firtname">Prénom</label>
                                <input type="text" class="form-control" id="firtname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-next" onclick="nextStep(2)">
                                    Continuer
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 3: Paiement -->
                        <div class="form-step" id="step3">
                            <h3 class="h4 mb-4">Paiement</h3>
                            
                            <div class="form-group">
                                <label for="card">Numéro de carte</label>
                                <input type="text" class="form-control" id="card" required>
                            </div>
                            <div class="form-group">
                                <label for="expiry">Date d'expiration</label>
                                <input type="text" class="form-control" id="expiry" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-next">
                                    Payer
                                    <i class="fas fa-check-circle ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

<script>
    function nextStep(currentStep) {
        document.querySelector(`#step${currentStep}`).classList.remove('active');
        document.querySelector(`#step${currentStep + 1}`).classList.add('active');
        document.querySelectorAll('.step')[currentStep].classList.add('active');
    }
</script>
</html>
