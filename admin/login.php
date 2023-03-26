<?php
    session_start();
    require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

    <style>
        .main {
            height: 100vh;
        }

        .login-box {
            width: 400px;
            height: 250px;
            box-sizing: border-box;
            border-radius: 10px;
            padding: 20px;
        }

        .judul {
            font-family: Courier, monospace;
        }
    </style>

<body class="">
    <div class="main d-flex flex-column align-items-center d-flex justify-content-center">
        <div class="login-box shadow">
            <div class="judul text-center">
                <h4>WELCOME</h4>
            </div>
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success mt-3 form-control" type="submit" name="loginbtn">Sign In</button>
                </div>
            </form>
        </div>
        
        <div class="mt-3" style="width:400px;">
                <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if($countdata>0){
                        if (password_verify($password, $data['password'])){
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: index.php');
                        } else {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                            Password Salah!
                            </div>
                        <?php
                        }
                    }
                    else {
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Akun Tidak Tersedia!
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
    </div>
</body>
</html>