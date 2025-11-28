<?php
session_start();
if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == 'logout') {
    $_SESSION['id_user'] = null;
  }
}

include "../koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WarungKu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/menu.css">
</head>

<body style="background-color: #F5F5DC;">
  <!-- ini navbar -->
  <?php
  if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    include "nav_isset.php";
  } else {
    $id_user;
    include "nav_empty.php";
  }
  ?>
  <!-- ini navbar -->

  <!-- ini tombol filter -->
  <?php
  $tipe = isset($_GET['tipe']) ? $_GET['tipe'] : 'semua';
  ?>
  <div class="d-flex justify-content-center align-items-center mt-0 mb-3 z-3 column-gap-2" style="margin-left: 25px; top: 100px; width: fit-content">
    <button class="btn rounded-pill filter-btn <?php if ($tipe == 'semua') echo 'active' ?>" id="filter-btn" onclick="window.location.href = '?tipe=semua';">Semua</button>
    <button class="btn rounded-pill filter-btn <?php if ($tipe == 'makanan') echo 'active' ?>" id="filter-btn" onclick="window.location.href = '?tipe=makanan';">Makanan</button>
    <button class="btn rounded-pill filter-btn <?php if ($tipe == 'minuman') echo 'active' ?>" id="filter-btn" onclick="window.location.href = '?tipe=minuman';">Minuman</button>
  </div>
  <!-- ini tombol filter -->

  <!-- ini daftar menu -->
  <div class="container-fluid d-flex flex-wrap justify-content-center">
    <?php

    if ($tipe == 'semua') {
      $query = mysqli_query($konek, "select * from menu");
    } else {
      $query = mysqli_query($konek, "select * from menu where tipe = '$tipe'");
    }

    while ($data = mysqli_fetch_array($query)) {
    ?>
      <div class="card mx-2 mb-4" style="width: 18rem;">
        <img src="<?php echo $data['gambar']; ?>" class="card-img-top" alt="Gambar Menu" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['nama']; ?></h5>
          <p class="card-text">
            <td><?php echo $data['deskripsi'] ?></td>
          </p>
          <p class="card-text fw-bold"><?php echo "Rp" . number_format($data['harga'], 0, ',', '.'); ?></p>
          <div class="d-flex justify-content-between align-items-center">
            <?php if (isset($_SESSION['id_user'])) { ?>
              <form action="tambah_pesanan.php" method="post" class="">
                <input type="hidden" name="id_menu" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="harga" value="<?php echo $data['harga']; ?>">
                <input type="hidden" name="kuantitas" value="1">
                <div class="d-flex justify-content-between align-items-center">
                  <button type="submit" class="btn add-btn" id="add-btn">Add</button>
                </div>
              </form>
            <?php } else { ?>
              <button type="button" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#emptyModal" id="add-btn" onclick="empty()">Add</button>
            <?php } ?>
            <button class="d-none notes-btn border rounded-pill" onclick="notes()">Notes <i class="bi bi-pencil-square"></i></button>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <!-- ini daftar menu -->

  <!-- ini notes pesanan -->
  <div class="modal d-none position-fixed z-3 top-0 start-0 w-100 h-100" id="notes">
    <div class="modal-container position-absolute text-dark my-2 mx-auto p-3 border rounded shadow-lg w-50 h-50 top-50 start-50 translate-middle overflow-auto bg-light">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h3 class="text-dark">Notes Pesanan</h3>
        <button name="close-btn" id="close-notes-btn" class="btn-close" onclick="notes()" aria-label="Close"></button>
      </div>
      <div class="modal-content d-flex flex-column row-gap-3 overflow-auto" style="max-height: calc(75% - 60px);">
        <form action="tambah_notes.php">
          <textarea class="form-control" placeholder="Tuliskan catatan kamu terkait menu ini" id="floatingTextarea"></textarea>
          <button type="submit" class="border rounded-pill">Save</button>
        </form>
      </div>
    </div>
  </div>
  <!-- ini notes pesanan -->

  <!-- ini detail pesanan -->
  <div class="modal fade" id="pesananModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-2" id="emptyModalLabel">Detail Pesanan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          $query = mysqli_query($konek, "select m.gambar, p.subtotal, p.id_pesanan, m.id, m.nama, m.harga, p.kuantitas from menu m join pesanan p on m.id = p.id_menu where id_user = '$id_user'");

          $total_bayar = 0;
          while ($data = mysqli_fetch_array($query)) {
            $subtotal = $data['kuantitas'] * $data['harga'];
            $total_bayar += $subtotal;
          ?>
            <div class="product text-dark d-flex align-items-center column-gap-3 border rounded p-2 bg-white shadow-sm">
              <img src="<?php echo $data['gambar'] ?>" alt="Produk" style="height: 5rem; width: 5rem; object-fit: cover;">
              <div class="detail flex-grow-1">
                <p class="fw-bold mb-0"><?php echo $data['nama'] ?></p>
                <p class="mb-0">Rp<?php echo number_format($data['harga'], 0, ',', '.') ?></p>
                <div class="d-flex justify-content-between">
                  <form action="update_pesanan.php" method="post">
                    <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan'] ?>">
                    <input type="hidden" name="id_menu" value="<?php echo $data['id'] ?>">
                    <input type="hidden" name="harga" value="<?php echo $data['harga'] ?>">
                    <div class="input-group d-flex align-items-center w-50 me-2">
                      <button class="btn" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                      <input type="number" name="kuantitas" min="0" step="1" value="<?php echo $data['kuantitas'] ?>" class="form-control text-center modern-number-input p-0 border-0" style="height: 13.9271px;" aria-label="Kuantitas">
                      <button class="btn" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                      <button type="submit" class="btn ms-2 text-black" id="save-btn">Save</button>
                    </div>
                  </form>
                  <p class="mb-0"><span class="fw-bold">Subtotal: </span>Rp<?php echo number_format($data['subtotal'], 0, ',', '.') ?></p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="modal-footer">
          <p class="mb-0 fw-bold">Total pembayaran: Rp<?php echo number_format($total_bayar, 0, ',', '.') ?></p>
          <form action="midtrans-php-master/examples/snap/checkout-process-simple-version.php" method="POST">
            <input type="hidden" name="nama" value="<?php echo $nama ?>">
            <input type="hidden" name="id" value="<?php echo $id_user ?>">
            <input type="hidden" name="stat" value="true">
            <input name="bayar" type="submit" value="Bayar" class="btn text-black" id="bayar-btn" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ini detail pesanan -->

  <!-- belum login -->
  <div class="modal fade" id="emptyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="emptyModalLabel">Anda Belum Login!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Silakan login untuk memesan produk ini!
        </div>
        <div class="modal-footer">
          <a href="../login/index.php" class="btn text-black" id="login-empty-btn">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- belum login -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/menu.js"></script>
</body>

</html>