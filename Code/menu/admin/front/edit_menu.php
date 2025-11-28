<?php
session_start();
include "../../../koneksi.php";

if ($_SESSION['status_user'] != "admin") {
  header("location:../../../login/index.php?pesan=belum_login");
}

$id_menu = $_GET['id_menu'];
$query = mysqli_query($konek, "select * from menu where id = '$id_menu'");
$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-body-tertiary">
  <!-- ini kontennya -->
  <div class="container" style="margin-top: 50px;">
    <h1 class="mb-4">Edit Menu</h1>
    <div class="container">
      <form action="../back/update_menu.php" method="post" class="d-flex flex-column row-gap-2">
        <input type="hidden" name="id_menu" value="<?php echo $data['id'] ?>">
        <label for="nama">ID</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan id menu" value="<?php echo $data['id'] ?>" disabled>
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama menu" value="<?php echo $data['nama'] ?>">
        <label for="nama">Harga</label>
        <input type="number" class="form-control" name="harga" placeholder="Masukkan harga menu (Rp)" value="<?php echo $data['harga'] ?>">
        <label for="nama">Kategori</label>
        <input type="text" class="form-control" name="kategori" placeholder="Masukkan kategori menu" value="<?php echo $data['tipe'] ?>">
        <label for="nama">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi menu" value="<?php echo $data['deskripsi'] ?>">
        <label for="nama">Gambar</label>
        <input type="text" class="form-control" name="gambar" placeholder="Masukkan link gambar menu" value="<?php echo $data['gambar'] ?>">
        <div class="d-flex column-gap-2 mt-3">
          <button type="submit" class="btn" style="background-color: #FF9800; width: 75px;">Simpan</button>
          <a href="../front/dashboard.php" class="btn btn-dark" style="width: 75px;">Cancel</a>
        </div>
      </form>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>