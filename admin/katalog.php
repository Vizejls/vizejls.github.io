<?php
    require "session.php";
    require "../koneksi.php";

    $querykatalog = mysqli_query($con, "SELECT katalog.*, kategori.nama as nama_kategori, jenis.nama as nama_jenis FROM katalog
                                        LEFT JOIN kategori on katalog.kategori_id = kategori.id
                                        LEFT JOIN jenis on katalog.jenis_id = jenis.id");
    $jumlahkatalog = mysqli_num_rows($querykatalog);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
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
                <a href="../admin" class="no-decoration text-muted"> 
                    <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-book"></i> Katalog
            </li>
        </ol>
    </nav>
    <div class="mt-3">
        <h2>List Katalog</h2>
    </div>
    <a href="tambah-katalog.php"><button type="submit" class="btn btn-primary mt-4" style="font-size: 12px;"><i class="fa-solid fa-plus"></i> Tambah Katalog</button></a>
    <div class="table-resposive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Kategori</td>
                    <td>Jenis</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
                    if($jumlahkatalog==0){
                ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data tersedia </td>
                    </tr>
                <?php
                    } else {
                        $number=1;
                        while($data=mysqli_fetch_array($querykatalog)){
                ?>
                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nama_kategori']; ?></td>
                        <td><?php echo $data['nama_jenis']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><?php echo $data['stok']; ?></td>
                        <td>
                            <a href="katalog-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info">
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