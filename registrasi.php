<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrasi Ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <body background="background_login.jpg">
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrasi Ke Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                        <?php
                                        if(isset($_POST['registrasi'])){
                                            $nama = $_POST['nama'];
                                            $username = $_POST['username'];
                                            $password = md5($_POST['password']);
                                            $email = $_POST['email'];
                                            $no_telepon = $_POST['no_telepon'];
                                            $alamat = $_POST['alamat'];
                                            $level = $_POST['level'];

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,username,password,email,no_telepon,alamat,level) VALUES ('$nama','$username','$password','$email','$no_telepon','$alamat','$level')");
                                           
                                        if($insert){
                                            echo '<script>alert("Selamat registrasi berhasil. Silahkan Login"); location.href="login.php"</script>';
                                        }else{
                                            echo '<script>alert("Registrasi gagal, silahkan ulangi kembali");</script>';
                                        }
                                    }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control" type="text" required name="nama" placeholder="Enter Nama Lengkap"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control" type="text" required name="username" placeholder="Enter Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" name="password" required type="password" placeholder="Enter Password"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control" type="text" required name="email" placeholder="Enter Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">No Telepon</label>
                                                <input class="form-control" type="number" required name="no_telepon" placeholder="Enter No Telepon"/>
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Level</label>
                                                <select name="level" required class="form-select">
                                                    <option value="admin">Admin</option>
                                                    <option value="peminjam">Peminjam</option>
                                                </select>
                                            </div>
                                            <div class="card-footer text-center">
                                                <div class="small">
                                                    <div class="row">
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0 btn btn-xs btn btn-primary">
                                                <button class="btn btn-primary" type="submit" name="registrasi" value="registrasi">Registrasi</button>
                                            </div>
                                                <p>Sudah Meiliki akun?<a href="login.php">Login?</a></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Perpustakaan Digital
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
