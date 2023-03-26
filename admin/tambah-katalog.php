<?php
    require "session.php";
    require "../koneksi.php";

    $querykatalog = mysqli_query($con, "SELECT * FROM katalog");
    $jumlahkatalog = mysqli_num_rows($querykatalog);

    $querykategori = mysqli_query($con, "SELECT * FROM kategori");
    
    $queryjenis = mysqli_query($con, "SELECT * FROM jenis");

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
    <title>Tambah Katalog</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-top: 10px;
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
                <i class="fa-solid fa-plus"></i> Tambah Katalog
            </li>
        </ol>
    </nav>
    <div class="my-3 col-12 col-md-6">
        <div class="input-box">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control mt-2" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" class="form-control mt-2" required>
                        <option value="">Pilih Satu</option>
                        <?php 
                            while($data=mysqli_fetch_array($querykategori)){
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                        <?php        
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="jenis">Jenis</label>
                    <select id="jenis" name="jenis" class="form-control mt-2"required>
                        <option value="">Pilih Satu</option>
                        <?php 
                            while($data=mysqli_fetch_array($queryjenis)){
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                        <?php        
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" name="harga" class="form-control mt-2" required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control mt-2">
                </div> 
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control mt-2" required></textarea>
                </div>
                <div>
                    <label for="stok">Stok</label>
                    <select name="stok" id="stok" class="form-control mt-2">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>                  
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                </div>
            </form>
            <?php
                if(isset($_POST ['simpan'])){
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
                                }
                            }
                        } 
                        $tambahkatalog=mysqli_query($con, "INSERT INTO katalog (kategori_id, jenis_id, nama, harga, foto, detail, stok) 
                        VALUES ('$kategori', '$jenis', '$nama', '$harga', '$new_name', '$detail', '$stok') ");
                        
                        if($tambahkatalog){
            ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Katalog berhasil diupdate
                         </div>
                         <meta http-equiv="refresh" content="1; url=katalog.php"/>
            <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
    </div>
</div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>