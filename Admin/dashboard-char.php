<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Login-register/login.php");
    exit();
}

include '../config/db.php';

// Hitung Total Characters
$queryTotal = "SELECT COUNT(*) AS total FROM karakter";
$sqlTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($sqlTotal);
$totalCharacters = $rowTotal['total'];

// Hitung Total Anime Characters
$queryAnime = "SELECT COUNT(*) AS total_anime 
               FROM karakter 
               JOIN categories ON karakter.category_id = categories.id 
               WHERE categories.name = 'Anime'";
$sqlAnime = mysqli_query($conn, $queryAnime);
$rowAnime = mysqli_fetch_assoc($sqlAnime);
$totalAnime = $rowAnime['total_anime'];

// Hitung Total Game Characters
$queryGame = "SELECT COUNT(*) AS total_game 
              FROM karakter 
              JOIN categories ON karakter.category_id = categories.id 
              WHERE categories.name = 'Game'";
$sqlGame = mysqli_query($conn, $queryGame);
$rowGame = mysqli_fetch_assoc($sqlGame);
$totalGame = $rowGame['total_game'];

// Ambil data karakter terbaru
$queryLatest = "SELECT karakter.*, categories.name AS category_name 
                FROM karakter 
                JOIN categories ON karakter.category_id = categories.id 
                ORDER BY karakter.id DESC LIMIT 5";
$sqlLatest = mysqli_query($conn, $queryLatest);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charku - Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar Styling */
    #sidebarMenu {
        position : fixed;
        background-color: black;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        width: 250px;
        height: 100%;
    }

        /* Konten utama agar tidak tertutup sidebar */
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <?php include '../Layout/sidebar.php'; ?>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9 col-lg-10 content">
                <div class="container mt-4">
                    <h1>Dashboard</h1>

                    <!-- Card Summary -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Characters</h5>
                                    <p class="card-text" style="font-size: 2rem;"><?php echo $totalCharacters; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Anime Characters</h5>
                                    <p class="card-text" style="font-size: 2rem;"><?php echo $totalAnime; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-danger">
                                <div class="card-body">
                                    <h5 class="card-title">Game Characters</h5>
                                    <p class="card-text" style="font-size: 2rem;"><?php echo $totalGame; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat Karakter Terbaru -->
                    <h2 class="mt-5">Latest Added Characters</h2>
                    <div class="table-responsive">
                        <table id="charList" class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Origin</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($sqlLatest)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($row['asal']); ?></td>
                                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- End of Main Content -->
        </div> <!-- End of Row -->
    </div> <!-- End of Container -->

</body>
</html>
