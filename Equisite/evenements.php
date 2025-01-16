<?php
include_once '../class/class.evenements.php';

// Création d'une instance de la classe Evenements
$evenements = new Evenements();
// Récupération de tous les événements depuis la base de données
$evenementsList = $evenements->EvenementsAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Equihorizon - Centre Équestre</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Centered logo -->
            <a href="index.php" class="navbar-brand d-flex justify-content-center position-absolute start-50 translate-middle-x" style="top: -10px;"> <!-- Added top property -->
                <img src="../photos/equip.png" alt="Logo" class="m-0" style="height: 100px;">
            </a>

            <!-- Links on the left -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                <div class="navbar-nav p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link me-2" style="font-size: 15px !important;">Accueil</a>
                    <a href="propos.php" class="nav-item nav-link me-3" style="font-size: 15px !important; white-space: nowrap;">À propos</a>
                    <a href="cavaliers.php" class="nav-item nav-link me-3" style="font-size: 15px !important;">Cavaliers</a>
                    <a href="evenements.php" class="nav-item nav-link active me-3" style="font-size: 15px !important;">Événements</a>
                    <a href="cours.php" class="nav-item nav-link me-3" style="font-size: 15px !important;">Cours</a>
                    <a href="cavalerie.php" class="nav-item nav-link me-3" style="font-size: 15px !important;">Cavalerie</a>
                    <a href="contact.php" class="nav-item nav-link" style="font-size: 15px !important;">Contact</a>
                </div>
            </div>

            <!-- Topbar content on the right -->
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+33 1 23 45 67 89</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Appointment button on the right -->
            <a href="vue.utilisateurs.php" class="login-button">
                <i class="fas fa-user"></i> Espace Utilisateur
            </a>
        </div>
    </nav>
    <!-- Navbar End -->

    <style>
        /* Styles pour la section Actualités */
        .news {
            padding: 30px 0;
            background-color: #f8f9fa;
            text-align: center; /* Centrer le texte */
        }

        .news h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
            font-family: 'Open Sans', sans-serif;
            position: relative;
        }

        .news h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: #e67e22;
            left: 50%;
            bottom: -15px;
            transform: translateX(-50%);
        }

        .news-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centrer les articles */
            gap: 15px;
        }

        .news-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            max-width: 300px; /* Réduire la largeur maximale */
            margin: 10px; /* Ajouter une marge pour espacer les cartes */
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .news-card img {
            width: 100%;
            height: 150px; /* Réduire la hauteur des images */
            border-bottom: 2px solid #e67e22;
            transition: transform 0.3s;
            object-fit: cover; /* Assurer que l'image couvre toute la zone */
        }

        .news-card:hover img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 10px; /* Réduire le padding interne */
        }

        .news-content h3 {
            margin-bottom: 10px;
            font-size: 1.2rem; /* Réduire la taille du titre */
            color: #333;
            font-family: 'Roboto', sans-serif;
            transition: color 0.3s;
        }

        .news-content h3:hover {
            color: #e67e22;
        }

        .news-content p {
            margin-bottom: 15px;
            font-size: 0.9rem; /* Réduire la taille du texte */
            color: #777;
            font-family: 'Open Sans', sans-serif;
        }

        .news-content .read-more {
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            color: #e67e22; /* Changer la couleur du texte en orange */
            border: none; /* Enlever la bordure */
            background-color: transparent; /* Enlever le fond */
            transition: transform 0.3s, color 0.3s;
            position: relative;
            overflow: hidden;
            text-decoration: none; /* Enlever le soulignement du lien */
            font-size: 0.9rem; /* Réduire la taille du texte du bouton */
        }

        .news-content .read-more:hover {
            transform: translateY(-2px);
            color: #d35400; /* Changer la couleur du texte au survol */
        }

        .news-content .read-more::after {
            content: '\2192'; /* Code Unicode pour la flèche droite */
            margin-left: 8px; /* Espacement entre le texte et la flèche */
            transition: margin-left 0.3s;
            font-size: 0.9rem; /* Réduire la taille de l'icône de flèche */
        }

        .news-content .read-more:hover::after {
            margin-left: 12px; /* Déplacer légèrement la flèche vers la droite au survol */
        }

        .news-content .badge {
            display: inline-block;
            padding: 3px 8px;
            background-color: #e67e22;
            color: #fff;
            font-size: 0.8rem;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .news-content .date {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #999;
            font-size: 0.8rem;
        }

        .news-content .date i {
            margin-right: 5px;
        }

        /* Styles pour le bouton "Voir la suite" */
        .btn-primary {
            background-color: #e67e22;
            border-color: #e67e22;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #d35400;
            transform: translateY(-2px);
        }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('../photos/bubbles.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
        <div class="container py-5" style="position: relative; z-index: 2;">
            <h1 class="display-3 text-white mb-3 animated slideInDown text-start">Évènement</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Section Actualités -->
    <section class="news py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nos Actualités</h2>
            <div class="news-grid row">
                <?php foreach ($evenementsList as $e): ?>
                    <article class="news-card col-md-4 mb-4" data-aos="fade-up">
                        <?php
                        $photos = $evenements->getPhotosByIdeve($e['ideve']);
                        if (!empty($photos)):
                            if (count($photos) > 1): ?>
                                <div id="carousel-<?php echo $e['ideve']; ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($photos as $index => $photo):
                                            $photoPath = '../uploads/' . basename($photo['lienphoto']);
                                            if (file_exists($photoPath)): ?>
                                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                                    <img src="<?php echo $photoPath; ?>" alt="<?php echo $e['titre']; ?>" class="d-block w-100">
                                                </div>
                                            <?php endif;
                                        endforeach; ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $e['ideve']; ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $e['ideve']; ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            <?php else:
                                $photoPath = '../uploads/' . basename($photos[0]['lienphoto']);
                                if (file_exists($photoPath)): ?>
                                    <img src="<?php echo $photoPath; ?>" alt="<?php echo $e['titre']; ?>" class="img-fluid">
                                <?php else: ?>
                                    <span>Photo introuvable : <?php echo basename($photos[0]['lienphoto']); ?></span>
                                <?php endif;
                            endif;
                        else: ?>
                            <img src="../photos/default.jpg" alt="Default Image" class="img-fluid">
                        <?php endif; ?>
                        <div class="news-content p-3">
                            <span class="badge bg-primary">Nouveau</span>
                            <div class="date mb-2">
                                <i class="fas fa-calendar-alt"></i>
                                <span>15 Juin 2024</span>
                            </div>
                            <h3><?php echo htmlspecialchars($e['titre']); ?></h3>
                            <p><?php echo htmlspecialchars($e['commentaire']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Section Actualités End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Adresse</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Rue, Paris, France</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+33 1 23 45 67 890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>equi@herizon.fr</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <p><i class="fas fa-horse me-3"></i>Équitation</p>
                    <p><i class="fas fa-horse-head me-3"></i>Dressage</p>
                    <p><i class="fas fa-horse me-3"></i>Saut d'obstacles</p>
                    <p><i class="fas fa-child me-3"></i>Cours pour enfants</p>
                    <p><i class="fas fa-user me-3"></i>Cours pour adultes</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">S'inscrire</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <img src="../photos/equi.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright text-center">
                <div class="row">
                    <div class="col-12">
                        &copy; Equihorizon, Tous Droits Réservés.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
