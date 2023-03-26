<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $querykatalog = mysqli_query($con, "SELECT katalog.*, kategori.nama as nama_kategori, jenis.nama as nama_jenis FROM katalog
                                 LEFT JOIN kategori on katalog.kategori_id = kategori.id
                                 LEFT JOIN jenis on katalog.jenis_id = jenis.id
                                 WHERE katalog.id = '$id'");

    $data = mysqli_fetch_array($querykatalog);

    $querykategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

    $queryjenis = mysqli_query($con, "SELECT * FROM jenis WHERE id!='$data[jenis_id]'");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Katalog</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    form div{
        margin-top: 10px;
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
                <a href="../admin" class="no-decoration text-muted"> 
                    <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="katalog.php" class="no-decoration text-muted">
                <i class="fa-solid fa-book"></i> Katalog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-magnifying-glass"></i> Detail Katalog
            </li>
        </ol>
    </nav>
    <h2>Detail Katalog</h2>

    <div class="col-12 col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama" class="mt-3">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>">
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="form-control mt-2" required>
                    <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                    <?php 
                        while($datakategori=mysqli_fetch_array($querykategori)){
                    ?>
                        <option value="<?php echo $datakategori['id']; ?>"><?php echo $datakategori['nama']; ?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="jenis">Jenis</label>
                <select id="jenis" name="jenis" class="form-control mt-2"required>
                    <option value="<?php echo $data['jenis_id']; ?>"><?php echo $data['nama_jenis']?></option>
                    <?php 
                        while($datajenis=mysqli_fetch_array($queryjenis)){
                    ?>
                        <option value="<?php echo $datajenis['id']; ?>"><?php echo $datajenis['nama']; ?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control mt-2" value="<?php echo $data['harga']?>"required>
            </div>
            <div>
                <label for="currentfoto">Foto Katalog Sekarang</label>
                <img class="form-control" src="../img/<?php echo $data['foto']; ?>" alt="" width="100px">
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control mt-2">
             </div>
             <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control mt-2" required>
                    <?php echo $data['detail']; ?>
                </textarea>
            </div> 
            <div>
                <label for="stok">Stok</label>
                <select name="stok" id="stok" class="form-control mt-2">
                    <option value="<?php echo $data['stok']; ?>"><?php echo $data['stok']; ?></option>
                    <?php
                        if($data['stok']=='Tersedia'){
                    ?>
                        <option value="Habis">Habis</option>
                    <?php
                        } else {
                    ?>
                        <option value="Tersedia">Tersedia</option>
                    <?php
                        }
                    ?>
                </select>
            </div> 
            
            <div class="mt-3 d-flex justify-content-between">
                <button type="submit"class="btn btn-primary" name="editBtn"><i class="fa-solid fa-pen"></i> Edit</button>
                <button type="submit"class="btn btn-danger" name="deleteBtn"><i class="fa-solid fa-trash-can"></i> Delete</button>
            </div>
        </form>
        <?php
            if(isset($_POST['editBtn'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $jenis = htmlspecialchars($_POST['jenis']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $stok = htmlspecialchars($_POST['stok']);

                $target_dir = "../img/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name= generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama=='' || $kategori=='' || $jenis=="" || $harga=='' || $detail==''){
        ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Nama, Kategori, Jenis, Harga, Foto, Detail wajib diisi!
                </div>
        <?php
            } else {
                $queryupdate = mysqli_query($con, "UPDATE katalog SET kategori_id='$kategori', jenis_id='$jenis', 
                nama='$nama', harga='$harga', detail='$detail', stok='$stok' WHERE id=$id");
                
                if($nama_file!=''){
                    if($image_size >= 5000000){
        ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        File tidak boleh lebih dari 5 Mb
                    </div>
        <?php
                    } else {
                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
        ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        File harus JPG, PNG, atau GIF
                    </div>
        <?php
                        } else {
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                            $queryupdate = mysqli_query($con, "UPDATE katalog SET foto='$new_name' WHERE id='$id'");
                            if($queryupdate){
        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Katalog berhasil diupdate
                        </div>
                        <meta http-equiv="refresh" content="1; url=katalog.php"/>
        <?php
                            }
                        }
                    }
                }
            }
        }
        
        if(isset($_POST['deleteBtn'])){
            $querydelete=mysqli_query($con, "DELETE FROM katalog WHERE id='$id'");

            if($querydelete){
        ?>
            <div class="alert alert-success mt-3" role="alert">
                Katalog Berhasil di Hapus!
            </div>
            <meta http-equiv="refresh" content="1; url=katalog.php"/>
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