<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="css/menu.css">
</head>

<body style="background-color: #F5F5DC;">
  <!-- ini navbar -->
  <nav class="navbar mb-3 d-flex p-3 w-100 top-0 z-3 fixed-top" style="background-color: #F5F5DC;">
    <div class="d-flex flex-row">
      <div class="navbar-brand fw-bold">
        <i class="bi bi-shop"></i>
        WarungKU
      </div>
      <div class="navbar-nav d-flex flex-row justify-content-evenly column-gap-3 align-items-center">
        <a href="home.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="about.php" class="btn" style="background-color: #FF9800;">About</a>
      </div>
    </div>
    <div class="navbar-nav d-flex flex-row justify-content-evenly column-gap-3 align-items-center">
      <a href="../login/index.php" class="btn" id="login-btn">Login</a>
    </div>
  </nav>
  <!-- ini navbar -->

  <section class="hero-about" id="home">
    <main class="content">
      <div>
        <h1 class="text-white" style="font-size: 100px;">WarungKU</h1>
        <p class="text-white text-center">(UPN "Veteran" Yogyakarta)</p>
      </div>
    </main>
  </section>

  <!-- ini perkenalan -->
  <div class="contoh-produk d-flex justify-content-center" style="column-gap: 200px; margin-top: 200px;">
    <div>
      <img src="img-kopma/perkenalkan.jpeg" alt="gambar soto">
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h1 style="text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.5);">Perkenalkan Kami</h1>
      <div style="width: 450px; text-align: center; text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.3);">
        Selamat datang di <span>WarungKU</span>, Warung Kopma yang berada di FTI UPN "Veteran" Yogyakarta. Kami berkomitman menyediakan beragam menu terjangkau dan bervariasi untuk para mahasiswa di UPN "Veteran" Yogyakarta dan sekitarnya.
      </div>
      <a href="menu.php" class="mt-4 btn pesan-btn" style="box-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.2);">Pesan</a>
    </div>
  </div>
  <!-- ini perkenalan -->

  <!-- ini lokasi -->
  <div class="contoh-produk d-flex justify-content-center" style="column-gap: 200px; margin-top: 200px;">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h1 style="text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.5);">Kunjungi Kami</h1>
      <div style="width: 450px; text-align: center; text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.3);">
        <span>WarungKU</span> berada di Kampus 2 Babarsari UPN "Veteran" Yogyakarta, tepatnya di Jl. Tambak Bayan No.18, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
      </div>
      <a href="menu.php" class="mt-4 btn pesan-btn" style="box-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.2);">Pesan</a>
    </div>
    <div>
      <img src="img-kopma/kunjungi.jpeg">
    </div>
  </div>
  <!-- ini lokasi -->

  <!-- ini jam buka -->
  <div class="contoh-produk d-flex justify-content-center" style="column-gap: 100px; margin-top: 200px;">
    <div>
      <img src="img-kopma/jam-buka.jpeg" alt="gambar soto">
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h1 style="text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.5);">Jam Buka Kami</h1>
      <div class="jam-buka-detail d-flex column-gap-4 justify-content-center" style="width: 450px; text-align: center; text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.3);">
        <div style="font-size: 25px; font-weight:500; text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.5);">
          <div>Senin - Jumat</div>
          <div>07.00 - 13.00</div>
          <!-- <a href="about.php" class="btn mt-4" style="background-color: #FF9800; box-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.2);">Cari tahu lebih!</a> -->
        </div>
        <div style="font-size: 20px; text-shadow: 1rem 1rem 3rem rgba(1, 1, 3, 0.5);">
          <div><i class="bi bi-check-lg"></i> Sarapan pagi</div>
          <div><i class="bi bi-check-lg"></i> Sarapan siang</div>
          <div><i class="bi bi-check-lg"></i> Santap siang</div>
        </div>
      </div>
    </div>
  </div>
  <!-- ini jam buka -->

  <!-- ini footer -->
  <footer class="text-white d-flex justify-content-center align-items-center p-4" style="margin-top: 150px;background-color: black; min-height: 150px; column-gap: 500px;">
    <div class="text-center">
      <h2 class="fw-bold"><i class="bi bi-shop"></i> WarungKU</h2>
      <p>(UPN "Veteran" Yogyakarta)</p>
    </div>
    <div>
      <div class="text-white d-flex flex-column justify-content-center align-items-start" style="row-gap: 20px;">
        <a href="about.php" style="color: white;"><i class="bi bi-info-lg"></i> About</a>
        <a href="https://wa.me/qr/ABWI2OBD4IXUI1" target="_blank"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        <a href="https://maps.app.goo.gl/WbLJP7HREvtdTrBU7" target="_blank"><i class="bi bi-geo-alt"></i> Location</a>
      </div>
    </div>
  </footer>
  <!-- ini footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>