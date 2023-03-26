<?php
    require "session.php";
    require "../koneksi.php";

    $querykategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahkategori = mysqli_num_rows($querykategori);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
    .no-decoration {
        text-decoration: none;
    }

    .input-box {
            width: 400px;
            height: 250px;
            box-sizing: border-box;
            border: 1px;
            border-radius: 10px;
            padding: 20px;
        }
</style>
<body>
<?php require "navbar.php";?>
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../admin" class="no-decoration text-muted"> 
                    <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-bars"></i> Kategori
            </li>
        </ol>
    </nav>
    <div class="my-3 col-12 col-md-6">
        <div class="input-box">
            <h4><i class="fa-solid fa-plus"></i> Tambah Kategori</h4>
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="Masukan Nama Kategori" class="form-control mt-2">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php 
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $categoryexist= mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahkategoribaru = mysqli_num_rows($categoryexist);
                    if($jumlahkategoribaru > 0){
            ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Kategori sudah ada!
                    </div>
            <?php  
                    } else {
                        $savecategory = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori') ");
                        if($savecategory){
            ?>
                        <div class="alert alert-primary mt-3" role="alert">
                           Kategori Berhasil Tersimpan!
                        </div>
                        <meta http-equiv="refresh" content="2; url=kategori.php"/>
            <?php
                        }
                        else {
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
        </div>
    </div>
    <div class="mt-3">
        <h2>List Kategori</h2>
    </div>
    <div class="table-resposive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kategori</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($jumlahkategori==0){
                ?>
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data tersedia </td>
                    </tr>
                <?php
                    } else {
                        $number=1;
                        while($data=mysqli_fetch_array($querykategori)){
                ?>
                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td>
                            <a href="kategori-detail.php?awseadawda=<?php echo $data['id']; ?>" class="btn btn-info">
                            <i class="fa-solid fa-magnifying-glass"></i></a>
                        </td>
                    </tr>
                <?php
                    $number++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>