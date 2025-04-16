<?php

session_start();
require_once '../config/db.php';

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    }   else {
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email','$pass','$role')");
    }
    header("Location: ../Login-register/login.php");
    exit();
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header("Location: ../Admin/dashboard-char.php");
            } else {
                header("Location: ../Public/index.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header('Location: ../Login-register/login.php');
    exit();
}
?>