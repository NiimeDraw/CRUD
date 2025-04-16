<?php
include '../config/db.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $asal = mysqli_real_escape_string($conn, $_POST['asal']);
        $source = mysqli_real_escape_string($conn, $_POST['link']);
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
        $category = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
        $split = explode('.', $_FILES['foto']['name']);
        $ext = $split[count($split) - 1];
        $foto = $nama . '.' . $ext;
        
        $dir = "../img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        $allowedExt = ['jpg', 'jpeg', 'png'];
        if (!in_array(strtolower($ext), $allowedExt)) {
            echo "<script>alert('Hanya file JPG, JPEG, dan PNG yang diperbolehkan!');</script>";
            exit();
        }

        if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.');</script>";
            exit();
        }        

        move_uploaded_file($tmpFile, $dir . $foto);

        if (!filter_var($source, FILTER_VALIDATE_URL) ) {
            echo "<script>alert('URL tidak valid!'); window.history.back();</script>";
            exit();
        }                

        $query = "INSERT INTO karakter (nama, asal, link, deskripsi, category_id, foto) VALUES('$nama', '$asal','$source', '$deskripsi', '$category', '$foto')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: admin-char.php");
        } else {
            echo $query;
        }
    } else if($_POST['aksi'] == 'edit'){

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $asal = mysqli_real_escape_string($conn, $_POST['asal']);
        $source = mysqli_real_escape_string($conn, $_POST['link']);
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
        $category = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

        $queryShow = "SELECT * FROM karakter WHERE id = '$id'";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);
        
        if($_FILES['foto']['name'] == ''){
            $foto = $result['foto'];
        } else {
            $split = explode('.', $_FILES['foto']['name']);
            $ext = $split[count($split) - 1];
            $foto = $result['nama'] . '.' . $ext;
            unlink("../img/".$result['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], '../img/'. $foto);
        }

        if (!filter_var($source, FILTER_VALIDATE_URL) ) {
            echo "<script>alert('URL tidak valid!'); window.history.back();</script>";
            exit();
        }

        $query = "UPDATE karakter SET nama = '$nama', asal = '$asal', link = '$source', deskripsi = '$deskripsi', category_id = '$category', foto = '$foto' WHERE id = '$id';";
        $sql = mysqli_query($conn, $query);
        header("Location: admin-char.php");

    }
    
}

// Proses hapus karakter
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Ambil nama foto dari database berdasarkan id
    $queryShow = "SELECT foto FROM karakter WHERE id = '$id'";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow); 

    if (file_exists('../img/'.$result['foto'])) {
        unlink('../img/'.$result['foto']);
    }

    $query = "DELETE FROM karakter WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('Location: admin-char.php');
        exit;
    } else {
        echo "Gagal menghapus karakter.";
    }
}
?>