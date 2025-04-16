<!-- Tombol Toggler (terlihat hanya di layar kecil) -->
<nav class="navbar navbar-dark bg-dark d-md-none">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" id="sidebarToggle">
      <span class="navbar-toggler-icon"></span>
    </button>
    <span class="navbar-brand mb-0 h1">Charku</span>
  </div>
</nav>

<!-- Sidebar -->
<div id="sidebarMenu">
  <h2 class="text-center mt-2">Charku</h2>
  <ul class="nav flex-column mt-4">
    <li class="nav-item">
      <a class="nav-link text-white" href="../Public/index.php"><i class="fa fa-home"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="../Public/character.php"><i class="fa fa-user"></i> Characters</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="../Public/anime-character.php"><i class="fa fa-film"></i> Anime</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="../Public/game-character.php"><i class="fa fa-gamepad"></i> Game</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="../Logout/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>
</div>

<!-- Script Toggle -->
<script>
  // Ambil elemen-elemen terkait
  const sidebar = document.getElementById('sidebarMenu');
  const mainContent = document.querySelector('.main-content');
  const toggleBtn = document.getElementById('sidebarToggle');

  // Event klik untuk toggle sidebar
  toggleBtn.addEventListener('click', () => {
    // Tambah/hapus kelas hide-sidebar pada sidebar
    sidebar.classList.toggle('hide-sidebar');
    // Tambah/hapus kelas expanded pada konten utama
    mainContent.classList.toggle('expanded');
  });
</script>

<!-- Style Sidebar & Layout -->
<style>
  /* Sidebar hitam di kiri */
  #sidebarMenu {
    position: fixed;
    top: 0;
    left: 0;
    width: 220px;
    height: 100vh;
    background-color: #000; /* Warna hitam */
    color: #fff;
    overflow-y: auto;
    z-index: 1000;
    padding: 10px 0;
    transition: transform 0.3s ease; /* Animasi saat toggle */
  }

  /* Saat sidebar disembunyikan (tergeser ke kiri) */
  #sidebarMenu.hide-sidebar {
    transform: translateX(-220px);
  }

  /* Konten utama bergeser ke kanan (220px) */
  .main-content {
    margin-left: 220px;
    padding: 20px;
    transition: margin-left 0.3s ease;
  }

  /* Jika main-content "expanded", margin-left = 0 */
  .main-content.expanded {
    margin-left: 0;
  }

  /* Responsif: di layar kecil, default sidebar tersembunyi */
  @media (max-width: 768px) {
    #sidebarMenu {
      transform: translateX(-220px);
    }
    .main-content {
      margin-left: 0;
    }
  }

  /* Contoh styling link sidebar saat hover */
  #sidebarMenu .nav-link:hover {
    background-color: #333;
    border-radius: 4px;
  }
</style>
