<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: Login-register/login.php");
    exit();
}

include '../config/db.php'; // Koneksi ke database

// Pastikan ada parameter 'id'
if (!isset($_GET['id'])) {
    die("Character ID not specified.");
}

$id = intval($_GET['id']); // Konversi ke integer untuk keamanan
$query = "SELECT * FROM karakter WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) < 1) {
    die("Character not found.");
}

// Ambil data karakter
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detail Character</title>
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1>Detail Character</h1>
  <div class="row">
    <div class="col-md-4">
    <?php echo '<img src="../img/' . htmlspecialchars($row['foto']) . '" width="100%" class="card-img-top" alt="No Image">' ?>
    </div>
    <div class="col-md-8">
      <h2><?php echo htmlspecialchars($row['nama']); ?></h2>
      <p><strong>Origin:</strong> <?php echo htmlspecialchars($row['asal']); ?></p>
      <p><strong>Description:</strong> <?php echo htmlspecialchars($row['deskripsi']); ?></p>
      <?php if(!empty($row['link'])) { ?>
        <p><strong>Source:</strong> <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></p>
      <?php } ?>
      <a href="javascript:history.back()" class="btn btn-secondary">Back to Characters</a>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle -->
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
