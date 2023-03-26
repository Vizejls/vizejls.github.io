<?php
    require "koneksi.php";
    $queryjenis = mysqli_query($con, "SELECT * FROM jenis");

    // Get Product by Nama Produk/Keyword
    if(isset($_GET['keyword'])){
        $querykatalog = mysqli_query($con, "SELECT * FROM katalog
                                            WHERE katalog.nama OR detail LIKE '%$_GET[keyword]%'");
    }
    // Get Product by Jenis
    else if(isset($_GET['jenis'])) {
        $queryGetjenisId = mysqli_query($con, "SELECT id FROM jenis WHERE nama='$_GET[jenis]'");
        $jenisid = mysqli_fetch_array($queryGetjenisId);

        $querykatalog = mysqli_query($con, "SELECT * FROM katalog WHERE jenis_id='$jenisid[id]'");
    }
    // Get Product Default
    else {
        $querykatalog = mysqli_query($con, "SELECT * FROM katalog");
    }

    $countdata = mysqli_num_rows($querykatalog);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarComp. | Katalog</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require "navbar.php"; ?>

<!-- Banner Katalog -->
<div class="container-fluid banner-katalog text-center d-flex align-items-center">
    <div class="container">
        <h3 class="text-light">Katalog</h3>
    </div>
</div>

<!-- Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <h5 class="mb-3">Filter</h5>
        <ul class="list-group"> 
            <?php while ($data = mysqli_fetch_array($queryjenis)){ ?>    
            <li class="list-group-item">
                <a class="no-decoration text-dark" href="katalog.php?jenis=<?php echo $data['nama']; ?>">
                    <?php echo $data['nama']; ?>
                </a>
            </li>
            <?php } ?>
        </ul>
        </div>
        <div class="col-lg-9">
            <h5 class="text-center mb-3 mt-3">Produk</h5>
            <div class="row">
                <?php
                    if($countdata<1){
                ?>
                    <h5 class="my-5 text-center text-secondary"><i class="fa-solid fa-magnifying-glass"></i> Maaf, Produk yang anda cari tidak tersedia</h5>
                <?php
                    }
                ?>

                <?php while($katalog=mysqli_fetch_array($querykatalog)){?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="img-box">
                            <img src="img/<?php echo $katalog['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $katalog['nama']; ?></h5>
                                <p class="card-text text-truncate"><?php echo $katalog['detail']; ?></p>
                                <p class="text-harga">Rp. <?php echo $katalog ['harga']; ?></p>
                                <a href="katalog-detail.php?nama=<?php echo $katalog['nama']; ?>" class="btn btn-success">Lihat Detail</a>
                            </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require "footer.php";?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>