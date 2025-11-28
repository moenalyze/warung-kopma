<nav class="navbar mb-3 d-flex justify-content-between p-3 w-100 top-0 z-3 position-sticky" style="background-color: #F5F5DC;">
  <div class="d-flex flex-row">
    <div class="navbar-brand fw-bold">
      <i class="bi bi-shop"></i>
      WarungKU
    </div>
    <div class="navbar-nav d-flex flex-row justify-content-evenly column-gap-3 align-items-center">
      <a href="home.php">Home</a>
      <a href="menu.php" class="btn" style="background-color: #FF9800;">Menu</a>
      <a href="about.php">About</a>
      <a href="../login/back/logout.php">Logout</a>
    </div>
  </div>
  <button id="keranjang-btn" class="btn p-0 border-0 position-relative" name="cart" data-bs-toggle="modal" data-bs-target="#pesananModal" style="background-color: transparent" onclick="keranjang()">
    <i class="bi bi-cart cart" style="font-size: 30px;"></i>
    <div class="cart-quantity position-absolute fw-bold btn btn-danger p-0 rounded-circle" style="top: 0px; left: 22px;">
      <?php

      $query = mysqli_query($konek, "select kuantitas from pesanan where id_user = '$id_user'");
      $kuantitas = 0;
      while ($data = mysqli_fetch_array($query)) {
        $kuantitas += $data['kuantitas'];
      }
      echo $kuantitas;
      ?>
    </div>
  </button>
</nav>