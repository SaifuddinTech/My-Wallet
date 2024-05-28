<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: home.php");
    die();
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/logoku.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <title>Daftar My Wallet Sistem Kas</title>
    </head>
    <body>
    <section class="vh-100">
        <div class="container-fluid login">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="img/tampilan_login.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="cekdaftar.php" method="post">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <h1><b>Daftar</b></h1>
                </div>
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">--------------</p>
                </div>
                <!-- Email -->
                <div class="form-outline mb-4">
                    <input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan Username" />
                    <label class="form-label"> Username</label>
                </div>
                <!-- Password -->
                <div class="form-outline mb-3">
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Password " />
                    <label class="form-label"> Password</label>
                </div>
                <div class="form-outline mb-4">
                    <input class="form-control form-control-lg" type="text" name="nama" placeholder="Masukkan Nama Lengkap" />
                    <label class="form-label"> Nama Lengkap</label>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                    <button name="daftar" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit">Daftar</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Sudah mempunyai akun? <a href="login.php"
                        class="link-danger">Masuk</a></p>
                </div>

                </form>
            </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <div class="text-white mb-3 mb-md-0">
            Copyright © 2023. | Powered by fuddin.
            </div>
            <div>
            <a class="text-white me-4" href="https://www.instagram.com/n.saifuddinnn/">
                <i class="fab fa-2x fa-instagram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=6285334541652&#038;text=Jika%20butuh%20Bantuan%20atau%20Saran%2C%20bisa%20Hubungi%20Nomor%20ini%20*M. Andon Arifin*" class="text-white me-4">
                <i class="fab fa-2x fa-whatsapp"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="fab fa-2x fa-youtube"></i>
            </a>
            </div>
        </div>
    </section>
    </body>
    </html>