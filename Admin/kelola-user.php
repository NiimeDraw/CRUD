<?php
include '../config/db.php';

$name = "";
$email = "";
$password = "";
$role = "";
$id = ""; // Initialize to avoid errors

if (isset($_GET['edit_user'])) {
    $id = $_GET['edit_user'];  
    $query = "SELECT * FROM users WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        $name = $result['name'];
        $email = $result['email'];
        $password = $result['password'];
        $role = $result['role'];
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
    <style>
    /* Custom styling for dropdown on hover */
    .navbar .nav-item.dropdown:hover .dropdown-menu {
        display: block; /* Show dropdown on hover */
        margin-top: 0; /* Remove gap between nav item and dropdown */
    }
    .navbar .dropdown-menu {
        border: none; /* Remove border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
    }
    .navbar .dropdown-item:hover {
        background-color: #f8f9fa; /* Background color on hover */
        color: #007bff; /* Text color on hover */
    }
    </style>
    <title>Charku</title>
</head>
<body>
    <!-- Main Navbar -->
    <?php include "../Layout/sidebar.php" ?>

    <div class="container content col-md-9 col-lg-10 p-4">
        <form id="characterForm" method="POST" action="proses-user.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars($name); ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" value="" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select name="role" required class="form-select" aria-label="Default select example">
                        <option value="" <?php echo ($role == "") ? "selected" : ""; ?>>---Select Role---</option>
                        <option value="user" <?php echo ($role == "user") ? "selected" : ""; ?>>User</option>
                        <option value="admin" <?php echo ($role == "admin") ? "selected" : ""; ?>>Admin</option>
                    </select>
                </div>
            </div>         
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php if (isset($_GET['edit_user'])) { ?>
                        <button type="submit" name="action" value="edit_user" class="btn btn-primary">Save</button>
                    <?php } else { ?>
                        <button type="submit" name="action" value="add_user" class="btn btn-primary">Submit</button>
                    <?php } ?>
                    <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>