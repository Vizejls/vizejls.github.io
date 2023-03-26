<?php
require "koneksi.php";
$querykategori = mysqli_query($con, "SELECT * FROM kategori");

if(isset($_GET['kategori'])) {
  $queryGetkategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
  $kategoriid = mysqli_fetch_array($queryGetkategoriId);

  $querykatalog = mysqli_query($con, "SELECT * FROM katalog WHERE kategori_id='$kategoriid[id]'");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand me-5" href="#">
      <img src="img/MarcComp1.png" alt="" width="100" height="60" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-5" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-5" href="katalog.php">Katalog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-5" href="katalog.php?kategori=PC/Desktops">PC/Desktops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-5" href="katalog.php?kategori=Laptop">Laptop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-5" href="katalog.php?kategori=Aksesoris">Aksesoris</a>
        </li>
      </ul>
      <form method="get" action="katalog.php" class="d-flex justify-content-end">
        <input class="form-control me-2" type="search" placeholder="Cari Sesuatu" aria-label="Search" name="keyword">
        <button class="btn btn-outline-light" type="submit">Telusuri</button>
      </form>
    </div>
  </div>
</nav>