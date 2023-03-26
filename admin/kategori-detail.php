<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['awseadawda'];

    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration{
        text-decoration: none;
    }
</style>

<body>
<?php require "navbar.php";?>
<div class="container mt-5">
    <h2>Detail Kategori</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../admin" class="no-decoration text-muted"> 
                    <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="kategori.php" class="no-decoration text-muted">
                <i class="fa-solid fa-bars"></i> Kategori</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-magnifying-glass"></i> Detail Kategori
            </li>
        </ol>
    </nav>

    <div class="col-12 col-md-6">
        <form action="" method="post">
            <div>
                <label for="kategori" class="mt-3">Kategori</label>
                <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <button type="submit"class="btn btn-primary" name="editBtn"><i class="fa-solid fa-pen"></i> Edit</button>
                <button type="submit"class="btn btn-danger" name="deleteBtn"><i class="fa-solid fa-trash-can"></i> Delete</button>
            </div>
        </form>

        <?php
            if(isset($_POST['editBtn'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                if($data['nama']==$kategori){
        ?>
                <meta http-equiv="refresh" content="0; url=kategori.php"/>
        <?php
                } else {
                    $categoryexist= mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahkategoribaru = mysqli_num_rows($categoryexist);
                    if($jumlahkategoribaru > 0){
        ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Kategori sudah ada!
                </div>
        <?php
                    } else {
                        $savecategory = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id' ");
                        if($savecategory){
        ?>
                        <div class="alert alert-success mt-3" role="alert">
                           Kategori Berhasil di Edit!
                        </div>
                        <meta http-equiv="refresh" content="1; url=kategori.php"/>
        <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }
        ?>
        <?php
            if(isset($_POST['deleteBtn'])){
                $check=mysqli_query($con, "SELECT * FROM katalog WHERE kategori_id='$id'");
                $datacount=mysqli_num_rows($check);

                if($datacount > 0){
        ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Kategori tidak dapat dihapus, kategori digunakan di Katalog!
                </div>
        <?php
        die();
                }

                $delete=mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                if($delete){
        ?>
                <div class="alert alert-success mt-3" role="alert">
                    Kategori Berhasil di Hapus!
                </div>
                <meta http-equiv="refresh" content="1; url=kategori.php"/>
        <?php
                } else {
                    echo mysqli_error($con);
                }
            }
        ?>

    </div>
</div>   
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>