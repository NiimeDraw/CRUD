<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: Login-register/login.php");
    exit();
}

include '../config/db.php'; // Koneksi ke database

// 1. Tentukan jumlah data per halaman
$limit = 6;

// 2. Ambil parameter halaman (page) dan keyword pencarian (search) dari URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';
if ($page < 1) $page = 1;

// 3. Hitung offset
$offset = ($page - 1) * $limit;

// 4. Siapkan kondisi pencarian (berdasarkan nama karakter)
//    Gunakan mysqli_real_escape_string untuk keamanan input
$searchCondition = '';
if (!empty($search)) {
    $searchSafe = mysqli_real_escape_string($conn, $search);
    $searchCondition = " AND karakter.nama LIKE '%$searchSafe%' ";
}

// 5. Hitung total data HANYA untuk kategori Game dengan pencarian (jika ada)
$countQuery = "
    SELECT COUNT(*) as total 
    FROM karakter 
    JOIN categories ON karakter.category_id = categories.id 
    WHERE categories.name = 'Game'
    $searchCondition
";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalData = $countRow['total'];

// 6. Hitung total halaman
$totalPages = ceil($totalData / $limit);

// 7. Query mengambil data HANYA untuk kategori Game dengan pencarian dan LIMIT/OFFSET
$query = "
    SELECT karakter.*, categories.name AS kategori 
    FROM karakter 
    JOIN categories ON karakter.category_id = categories.id 
    WHERE categories.name = 'Game'
    $searchCondition
    ORDER BY karakter.id DESC 
    LIMIT $offset, $limit
";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Characters</title>
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome (opsional) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    #sidebarMenu {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100vh;
      background-color: #000;
      color: #fff;
      overflow-y: auto;
      z-index: 1000;
      padding: 10px 0;
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
    @media (max-width: 768px) {
      #sidebarMenu {
        position: relative;
        width: 100%;
        height: auto;
      }
      .main-content {
        margin-left: 0;
      }
    }
    .card-img-top {
      width: 100%;
      height: auto; /* Menjaga aspect ratio gambar asli */
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<nav id="sidebarMenu">
  <?php include '../Layout/sidebar-home.php'; ?>
</nav>

<!-- Konten Utama -->
<div class="main-content">
  <div class="container mt-5">
    <h1 class="mb-4">Game Characters</h1>
    
    <!-- Form Pencarian -->
    <form method="GET" class="mb-4">
      <div class="input-group">
        <input 
          type="text" 
          name="search" 
          class="form-control" 
          placeholder="Cari karakter..." 
          value="<?php echo htmlspecialchars($search); ?>"
        >
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
    
    <!-- Daftar Karakter -->
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-4 mb-4">
          <div class="card">
          <?php 
              // Path file gambar
              $imageFile = '../img/' . htmlspecialchars($row['foto']);
              // Jika file ada, gunakan waktu modifikasi sebagai query string untuk cache busting
              if (file_exists($imageFile)) {
                  $ver = filemtime($imageFile);
              } else {
                  $ver = time();
              }
              echo '<img src="../img/' . htmlspecialchars($row['foto']) . '?ver=' . $ver . '" class="card-img-top" alt="No Image">';
            ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
              <p class="card-text">Origin: <?php echo htmlspecialchars($row['asal']); ?></p>
              <a href="detail-character.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Tampilkan Link Pagination -->
    <?php
      // Pastikan parameter search tetap ada di URL pagination
      $searchParam = !empty($search) ? '&search=' . urlencode($search) : '';
    ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <!-- Tombol Previous -->
        <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page - 1 . $searchParam; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>

        <!-- Nomor Halaman -->
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
          <li class="page-item <?php if($i == $page) echo 'active'; ?>">
            <a class="page-link" href="?page=<?php echo $i . $searchParam; ?>"><?php echo $i; ?></a>
          </li>
        <?php } ?>

        <!-- Tombol Next -->
        <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page + 1 . $searchParam; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    
  </div>
</div>

<!-- Bootstrap Bundle -->
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
