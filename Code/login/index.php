<?php
session_start();
$error = "";
if (empty($_SESSION["error_log"]) && empty($_SESSION["error_reg"])) {
  $error = "";
} else {
  $error = (empty($_SESSION["error_reg"])) ? $_SESSION["error_log"] : $_SESSION["error_reg"];
}

$pesan = "";
if (isset($_GET["pesan"])) {
  $pesan = $_GET["pesan"];
} else {
  $pesan = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KOPMA</title>
  <link rel="stylesheet" type="text/css" href="css/style.php">
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="back/ceklogin.php" autocomplete="off" class="sign-in-form" method="POST">
            <div class="logo">
              <img src="img/logo.png" alt="easyclass" />
              <h4>KOPMA</h4>
            </div>

            <div class="heading">
              <h2>Welcome Back</h2>
              <h6>Blom terdaftar?</h6>
              <a href="#" class="toggle">Sign up</a>
            </div>

            <div class="actual-form">
              <?php
              if (!empty($_SESSION["error_log"])) {
              ?>
                <div class="error-msg">
                  <?php
                  echo $error;
                  ?>
                </div>
              <?php
              }
              if ($pesan == "logout") {
              ?>
                <div class="error-msg">
                  <?php
                  echo "Anda berhasil logout";
                  ?>
                </div>
              <?php
              }
              if ($pesan == "belum_login") {
              ?>
                <div class="error-msg">
                  <?php
                  echo "Login terlebih dahulu";
                  ?>
                </div>
              <?php
              }
              if ($pesan == "bukan_admin") {
              ?>
                <div class="error-msg">
                  <?php
                  echo "Hanya admin yang dapat akses halaman dashboard!";
                  ?>
                </div>
              <?php
              }
              ?>
              <div class="input-wrap">
                <input
                  type="text"
                  minlength="4"
                  class="input-field"
                  autocomplete="off"
                  required
                  name="username" />
                <label>Nama</label>
              </div>

              <div class="input-wrap">
                <input
                  type="password"
                  minlength="8"
                  class="input-field"
                  autocomplete="off"
                  required
                  name="password" />
                <label>Password</label>
              </div>

              <input name="submit" type="submit" value="Sign In" class="sign-btn" />

            </div>
          </form>

          <form action="back/cekregister.php" autocomplete="off" class="sign-up-form" method="POST">
            <div class="logo">
              <img src="img/logo.png" alt="easyclass" />
              <h4>KOPMA</h4>
            </div>

            <div class="heading">
              <h2>Get Started</h2>
              <h6>Sudah punya akun?</h6>
              <a href="#" class="toggle">Sign in</a>
            </div>

            <div class="actual-form">
              <?php
              if (!empty($_SESSION["error_reg"])) {
              ?>
                <div class="error-msg">
                  <?php
                  echo $error;
                  ?>
                </div>
              <?php
              }
              ?>
              <div class="input-wrap">
                <input
                  type="text"
                  minlength="4"
                  class="input-field"
                  autocomplete="off"
                  required
                  name="username" />
                <label>Nama</label>
              </div>

              <div class="input-wrap">
                <input
                  type="text"
                  minlength="12"
                  class="input-field"
                  autocomplete="off"
                  required
                  name="nomor" />
                <label>Nomor Telepon</label>
              </div>

              <div class="input-wrap">
                <input
                  type="password"
                  minlength="8"
                  class="input-field"
                  autocomplete="off"
                  required
                  name="password" />
                <label>Password</label>
              </div>

              <input name="submit" type="submit" value="Sign Up" class="sign-btn" />

            </div>
          </form>
        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img src="img/kunjungi.jpeg" class="image img-1 show" alt="" />
            <img src="img/kesenangan.jpeg" class="image img-2" alt="" />
            <img src="img/perkenalkan.jpeg" class="image img-3" alt="" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Selamat Datang di KOPMA</h2>
                <h2>Kesenangan Mahasiswa</h2>
                <h2>Murah dan Kenyang</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="app.js"></script>
  <script>
    <?php
    if (!empty($_SESSION["error_reg"])) {
    ?>
      main.classList.add("sign-up-mode");
    <?php
    }
    ?>
  </script>
</body>

</html>