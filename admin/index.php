<?php
    require "session.php";
    require "../koneksi.php";

    $kategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahkategori = mysqli_num_rows($kategori);
    
    $katalog = mysqli_query($con, "SELECT * FROM katalog");
    $jumlahkatalog = mysqli_num_rows($katalog);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-katalog {
        background-color: #808080;
        border-radius: 15px;
    }

    .summary-kategori {
        background-color: #808080;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php";?>
    <div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-house"></i> Home
            </li>
        </ol>
    </nav>
        <h2>Halo Admin</h2>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="summary-katalog p-4">
                    <div class="row">
                        <div class="col-6 mt-1 text-white">
                        <i class="fa-solid fa-book fa-5x text-black"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-3">Katalog</h3>
                            <p class="fs-5"> <?php echo $jumlahkatalog; ?> Produk</p>
                            <a href="katalog.php" class="text-white no-decoration">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="summary-kategori p-4">
                    <div class="row">
                        <div class="col-6 text-white">
                        <i class="fa-solid fa-bars fa-5x text-black"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-3">Kategori</h3>
                            <p class="fs-5"> <?php echo $jumlahkategori; ?> Kategori</p>
                            <a href="kategori.php" class="text-white no-decoration">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>