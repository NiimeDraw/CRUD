<?php
include '../config/db.php';

if(isset($_POST['action'])) {
    // Ambil dan sanitasi input
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role  = mysqli_real_escape_string($conn, $_POST['role']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email tidak valid.";
        exit;
    }

    if($_POST['action'] == 'add_user') {
        // Hash password untuk penyimpanan yang aman
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (`name`, `email`, `password`, `role`) 
                  VALUES('$name', '$email', '$hashedPassword', '$role')";
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header("Location: admin-user.php");
            exit;
        } else {
            echo mysqli_error($conn);
        }
    } else if($_POST['action'] == 'edit_user') {
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        // Jika field password tidak kosong, update password
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users 
                      SET `name` = '$name', 
                          `email` = '$email', 
                          `password` = '$hashedPassword', 
                          `role` = '$role' 
                      WHERE id = '$id'";
        } else {
            // Jika password kosong, jangan update kolom password
            $query = "UPDATE users 
                      SET `name` = '$name', 
                          `email` = '$email', 
                          `role` = '$role' 
                      WHERE id = '$id'";
        }
        
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header("Location: admin-user.php");
            exit;
        } else {
            echo mysqli_error($conn);
        }
    }
}


if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']); // or use mysqli_real_escape_string if id is not a number
    $query = "DELETE FROM users WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('Location: admin-user.php');
        exit;
    } else {
        echo "Failed to delete user: " . mysqli_error($conn);
    }
}

?>