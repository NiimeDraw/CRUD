<?php
include '../config/db.php';

$nama = "";
$asal = "";
$deskripsi = "";
$category = "";
$source = "";
$id = ""; // Inisialisasi agar tidak error

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];  
    $query = "SELECT * FROM karakter WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        $nama = $result['nama'];
        $asal = $result['asal'];
        $deskripsi = $result['deskripsi'];
        $category = $result['category_id'];
        $source = $result['link'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Charku</title>
</head>
<body>
    <!-- Main Navbar -->
    <?php include "../Layout/sidebar.php" ?>

    <div class="container content col-md-9 col-lg-10 p-4">
        <form id="characterForm" method="POST" action="proses.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

          <div class="mb-3 row">
              <label for="nama" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="asal" class="col-sm-2 col-form-label">Name of Anime/Game</label>
              <div class="col-sm-10">
            <input type="text" name="asal" class="form-control" id="asal" value="<?php echo htmlspecialchars($asal); ?>" required>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="link" class="col-sm-2 col-form-label">Source</label>
              <div class="col-sm-10">
            <input type="url" name="link" class="form-control" id="link" value="<?php echo htmlspecialchars($source); ?>" required >
              </div>
          </div>
          <div class="mb-3 row">
              <label for="deskripsi" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
            <textarea name="deskripsi" class="form-control" id="deskripsi" required><?php echo htmlspecialchars($deskripsi); ?></textarea>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="category_id" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                  <select name="category_id" required class="form-select" aria-label="Default select example">
                      <option value="" <?php echo ($category == "") ? "selected" : ""; ?>>---Select Category---</option>
                      <option value="1"<?php echo ($category == "1") ? "selected" : ""; ?>>Anime</option>
                      <option value="2"<?php echo ($category == "2") ? "selected" : ""; ?>>Game</option>
                  </select>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="foto" class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
              </div>
          </div>              
          <div class="mb-3 row mt-4">
              <div class="col">
            <?php if (isset($_GET['edit'])) { ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-primary">Save</button>
            <?php } else { ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary">Submit</button>
            <?php } ?>
            <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
              </div>
          </div>
        </form>
  </div>
</body>
</html>