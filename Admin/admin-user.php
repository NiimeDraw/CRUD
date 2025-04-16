<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Login-register/login.php");
    exit();
}

include '../config/db.php';

// Query untuk mengambil data dari tabel User
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$data = [];
$no = 1;
// Simpan hasil query ke dalam array dan tambahkan nomor urut
while ($row = mysqli_fetch_assoc($result)) {
    $row['no'] = $no++ . ".";
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN - Data User</title>
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- JQWidgets CSS -->
  <link rel="stylesheet" href="../jqwidgets-component/jqwidgets/styles/jqx.base.css" type="text/css" />
  <link rel="stylesheet" href="../jqwidgets-component/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
  <style>
    /* Sidebar selalu setinggi viewport */
    .sidebar {
      min-height: 100vh;
      width: 200px;
      background-color: gray;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }
    /* Atur grid agar mengisi lebar dan tinggi yang sesuai */
    #grid {
        width: 100%;
        height: calc(100vh - 100px); /* Mengurangi tinggi header/margin jika perlu */
        margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="sidebar col-md-3 col-lg-2 d-md-block bg-dark">
          <?php include '../Layout/sidebar.php'; ?>
      </nav>
      <!-- Konten Utama -->
      <main class="content col-md-9 col-lg-10 p-4">
          <h2>Data User</h2>
          <a href="kelola-user.php" class="btn btn-primary mb-3">Tambah User</a>
          <div id="grid"></div>
      </main>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap Bundle (dengan Popper) -->
  <script src="../js/bootstrap.bundle.min.js"></script>
  <!-- JQWidgets Scripts -->
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxcore.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxdata.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxbuttons.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxscrollbar.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxmenu.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.selection.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.columnsresize.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.filter.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.sort.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxgrid.pager.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxlistbox.js"></script>
  <script type="text/javascript" src="../jqwidgets-component/jqwidgets/jqxdropdownlist.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        // Mengambil data dari PHP ke dalam variabel JavaScript
        var data = <?php echo json_encode($data); ?>;
        
        // Konfigurasi data source untuk grid
        var source = {
            localdata: data,
            datatype: "array",
            datafields: [
                { name: 'no', type: 'string' },
                { name: 'id', type: 'string' },
                { name: 'name', type: 'string' },
                { name: 'email', type: 'string' },
                { name: 'role', type: 'string' }
            ]
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        // Inisialisasi JQWidgets Grid dengan tombol Edit dan Delete
        $("#grid").jqxGrid({
            theme: 'bootstrap',
            source: dataAdapter,
            sortable: true,
            filterable: true,
            pageable: true,
            autoheight: true,
            columnsresize: true,
            width: '100%',
            height: $(window).height() - 100,
            columns: [
                { text: 'No.', datafield: 'no', width: '5%' },
                { text: 'Nama', datafield: 'name' },
                { text: 'Email', datafield: 'email' },
                { text: 'Role', datafield: 'role' },
                { text: 'Aksi', datafield: 'action', 
                  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                      var id = $("#grid").jqxGrid('getcellvalue', row, 'id');
                      var editButton = '<button class="btn btn-sm btn-warning" onclick="editRecord(' + id + ')">Edit</button>';
                      var deleteButton = '<button class="btn btn-sm btn-danger" onclick="deleteRecord(' + id + ')">Delete</button>';
                      return '<div style="text-align: center; margin-top: 4px;">' + editButton + ' ' + deleteButton + '</div>';
                  }
                }
            ]
        });
    });

    // Fungsi untuk mengarahkan ke halaman edit
    function editRecord(id) {
        window.location.href = 'kelola-user.php?edit_user=' + id;
    }

    // Fungsi untuk mengonfirmasi dan menghapus data
    function deleteRecord(id) {
        if(confirm("Anda yakin ingin menghapus data ini?")){
            window.location.href = 'proses-user.php?hapus=' + id;
        }
    }
  </script>
</body>
</html>
