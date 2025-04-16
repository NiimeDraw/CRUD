<div class="sidebar">
    <h2 class="brand">Charku</h2>
    <ul class="nav-links">
        <li><a href="../Admin/dashboard-char.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="../Admin/admin-char.php"><i class="fa fa-user"></i> Characters</a></li>
        <li><a href="../Admin/admin-user.php"><i class="fa fa-users"></i> User</a></li>
        <li><a href="../Logout/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>

<style>
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 230px;
        height: 100vh;
        background-color: #111;
        padding-top: 20px;
        color: white;
    }

    .brand {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .nav-links {
        list-style: none;
        padding: 0;
    }

    .nav-links li {
        padding: 10px 20px;
    }

    .nav-links li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav-links li a:hover {
        background: #333;
        border-radius: 5px;
    }

    .content {
        margin-left: 250px; /* Memberi ruang agar tidak tertutup sidebar */
        padding: 20px;
    }
</style>
