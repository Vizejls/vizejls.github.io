<?php
 require "koneksi.php";

 $nama=htmlspecialchars($_GET['nama']);

 $katalog=mysqli_query($con, "SELECT * FROM katalog WHERE nama='$nama'");
 $produk=mysqli_fetch_array($katalog);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarComp. | Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Navbar -->
<?php require "navbar.php";?>

<!-- Detail Produk -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt">
                <img src="img/<?php echo $produk['foto']; ?>" width="300" alt="">
            </div>
            <div class="col-md-7 offset-md-1 mt-3">
                <h4> <?php echo $produk['nama']; ?> </h4>
                <p class="py-3"><?php echo $produk['detail']; ?> </p>
                <p class="pt-3">Rp. <?php echo $produk['harga']; ?> </p>
                <p>Stok : <strong><?php echo $produk['stok']; ?> </strong></p>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>