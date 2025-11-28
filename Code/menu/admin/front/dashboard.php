<?php
session_start();
if (empty($_SESSION['id_user'])) {
  header("location:../../../login/index.php?pesan=belum_login");
} else if ($_SESSION['status_user'] != "admin") {
  header("location:../../../login/index.php?pesan=bukan_admin");
}
include "../../../koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../css/dashboard.css">
</head>

<body style="background-color: #F5F5DC;">
  <!-- ini navbar + sidebar -->
  <nav class="navbar fixed-top" style="background-color: #F5F5DC;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 300px;">
        <div class="offcanvas-header" style="background-color: #F5F5DC;">
          <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">Admin Dashboard</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="background-color: #F5F5DC;">
          <ul class="navbar-nav justify-content-end row-gap-3 flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="#dashboard" id="dashboard-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#menu" id="menu-link">Manajemen Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pesanan" id="pesanan-link">Manajemen Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pengguna" id="pengguna-link">Manajemen Pengguna</a>
            </li>
          </ul>
        </div>
      </div>
      <a class="btn btn-black" id="logout-btn" href="../../../login/back/logout.php">Logout</a>
    </div>
  </nav>

  <!-- ini kontennya -->
  <div class="container" style="margin-top: 75px;">
    <h1 class="mb-4" id="dashboard">Dashboard</h1>
    <div class="info">
      <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Total Menu Tersedia</h5>
              <?php
              $query = mysqli_query($konek, "select * from menu");
              $jumlah = mysqli_num_rows($query);
              ?>
              <p class="card-text"><?php echo $jumlah ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Total Pesanan Diterima</h5>
              <?php
              $query = mysqli_query($konek, "select sum(kuantitas) from riwayat_pesanan");
              $data = mysqli_fetch_array($query);
              ?>
              <p class="card-text"><?php echo $data['sum(kuantitas)'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Total Pengguna Aktif</h5>
              <?php
              $query = mysqli_query($konek, "select * from user where status = 'user'");
              $jumlah = mysqli_num_rows($query);
              ?>
              <p class="card-text"><?php echo $jumlah ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container menu mt-5">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-3" id="menu">Manajemen Menu</h3>
        <a href="tambah_menu.php" class="btn tambah-btn" style="background-color: #FF9800;"><i class="bi bi-plus-circle"></i> Tambah</a>
      </div>
      <div class="shadow overflow-auto rounded-4" style="max-height: 400px;">
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <td class="fw-bold">ID</td>
              <td class="fw-bold">Nama</td>
              <td class="fw-bold">Harga</td>
              <td class="fw-bold">Kategori</td>
              <td class="fw-bold">Deskripsi</td>
              <td class="fw-bold">Gambar</td>
              <td class="fw-bold"></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($konek, "select * from menu");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $data['id'] ?></td>
                <td style="max-width: 100px;"><?php echo $data['nama'] ?></td>
                <td style="max-width: 75px;"><?php echo "Rp" . number_format($data['harga'], 0, ',', '.'); ?></td>
                <td style="max-width: 75px;"><?php echo $data['tipe'] ?></td>
                <td style="max-width: 100px;"><?php echo $data['deskripsi'] ?></td>
                <td style="max-width: 150px;"><img src="<?php echo $data['gambar'] ?>" alt="Gambar Menu" style="height: 5rem; width: 5rem; object-fit: cover"></td>
                <td style="max-width: 150px;">
                  <a href="edit_menu.php?id_menu=<?php echo $data['id'] ?>" class="btn" style="background-color: #FF9800;">Edit</a>
                  <a href="../back/hapus_menu.php?id_menu=<?php echo $data['id'] ?>" class="btn" style="background-color: #d17878;">Delete</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container pesanan mt-5">
      <h3 class="mb-3" id="pesanan">Manajemen Pesanan Aktif</h3>
      <div class="shadow overflow-auto rounded-4" style="max-height: 300px;">
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <td class="fw-bold">ID Pesanan</td>
              <td class="fw-bold">ID User</td>
              <td class="fw-bold">ID Menu</td>
              <td class="fw-bold">Kuantitas</td>
              <td class="fw-bold">Subtotal</td>
              <td class="fw-bold">Tanggal Dibayar</td>
              <td class="fw-bold"></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($konek, "select * from pesanan");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $data['id_pesanan'] ?></td>
                <td><?php echo $data['id_user'] ?></td>
                <td><?php echo $data['id_menu'] ?></td>
                <td><?php echo $data['kuantitas'] ?></td>
                <td><?php echo "Rp" . number_format($data['subtotal'], 0, ',', '.'); ?></td>
                <td><?php echo $data['tanggal_dibayar'] ?></td>
                <td>
                  <a href="../back/tandai_selesai.php?id_pesanan=<?php echo $data['id_pesanan'] ?>" class="btn" style="background-color: #FF9800;">
                    <?php if ($data['tanggal_dibayar'] == null) {
                      echo "Tandai Selesai";
                    } else {
                      echo "Dibayar";
                    } ?></a>
                </td>
              </tr>
            <?php
            }
            ?>
            <?php
            $query = mysqli_query($konek, "select * from riwayat_pesanan");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $data['id_riwayat'] ?></td>
                <td><?php echo $data['id_user'] ?></td>
                <td><?php echo $data['id_menu'] ?></td>
                <td><?php echo $data['kuantitas'] ?></td>
                <td><?php echo "Rp" . number_format($data['subtotal'], 0, ',', '.'); ?></td>
                <td><?php echo $data['tanggal_dibayar'] ?></td>
                <td>
                  <a href="../back/tandai_selesai.php?id_pesanan=<?php echo $data['id_riwayat'] ?>" class="btn" style="background-color: #FF9800;">
                    <?php if ($data['tanggal_dibayar'] == null) {
                      echo "Tandai Selesai";
                    } else {
                      echo "Dibayar";
                    } ?></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container pesanan mt-5">
      <h3 class="mb-3" id="pengguna">Manajemen Pengguna</h3>
      <div class="shadow overflow-auto rounded-4" style="max-height: 300px;">
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <td class="fw-bold">ID</td>
              <td class="fw-bold">Username</td>
              <td class="fw-bold">Telepon</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($konek, "select * from user");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $data['id_user'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['telepon'] ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>