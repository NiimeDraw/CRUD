<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../Login-register/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME - Charku</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar Styling */
        #sidebarMenu {
            position: fixed;
            background-color: black;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            width: 200px;
            height: 100%;
            color: white;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Carousel Styling */
        .carousel-item img {
            width: 100%;
            height: 400px; /* Sesuaikan tinggi */
            object-fit: cover; /* Agar tidak terdistorsi */
            border-radius: 10px;
        }

        /* Card Styling */
        /* .card img {
            height: 200px;
            object-fit: cover;
        } */

        /* Responsive */
        @media (max-width: 768px) {
            #sidebarMenu {
                width: 100px;
            }
            .content {
                margin-left: 100px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-lg-3 col-md-4 col-12 d-md-block bg-dark sidebar collapse">
        <?php include '../Layout/sidebar-home.php'; ?>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="row align-items-center mt-5">
                <!-- Kolom Kiri (Teks Sambutan) -->
                <div class="col-lg-6 mb-4">
                    <h2>Welcome to Charku</h2>
                    <figure>
                        <blockquote class="blockquote">
                            <p>You can find your character information on Charku.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Click the button to <cite title="Source Title">explore</cite>
                        </figcaption>
                    </figure>
                </div>

                <!-- Kolom Kanan (Slideshow) -->
                <div class="col-lg-6">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indikator Carousel -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                        </div>

                        <!-- Gambar Carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/slide1.jpg" class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                            </div>
                        </div>

                        <!-- Navigasi Carousel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Karakter -->
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="../img/Onepiece_gif.gif" class="card-img-top" alt="Anime">
                        <div class="card-body">
                            <h5 class="card-title">Anime Character</h5>
                            <p class="card-text">Find various interesting characters from your favorite anime!</p>
                            <a href="anime_character.php" class="btn btn-success">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="../img/game_gif.gif" class="card-img-top" alt="Game">
                        <div class="card-body">
                            <h5 class="card-title">Game Character</h5>
                            <p class="card-text">Find characters from various games.</p>
                            <a href="game_character.php" class="btn btn-warning">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
