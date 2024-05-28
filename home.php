<?php 
session_start();
require 'koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>My Wallet Sistem Kas</title>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <link rel="icon" href="img/logoku.png">
            <link href="css/bootstrap.css" rel="stylesheet" />
            <link href="css/custom.css" rel="stylesheet" />
            <link href="assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
            <link href="assets/fontawesome-v6.4.0/css/all.min.css" rel="stylesheet" />  
        </head>
            <body class="g-sidenav-show   bg-gray-100">
            <!-- sidebar -->
            <div class="min-height-500 position-absolute w-100" style="background: linear-gradient(to bottom, #3751e2, #f8f9fa )"></div>
            <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
                <div class="sidenav-header text-center" style="height: 8rem;padding-top:10px">
                    <i class="fa-solid fa-xmark fa-xl p-3 cursor-pointer text-secondary opacity-10 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                    <a class="logo_brand" href="dashboard.php">
                        <img src="img/logoku.png" class="logo_brand_img" style="max-height: 8rem" alt="main_logo">
                    </a>
                </div>
            <hr class="horizontal dark mt-3">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav" style="padding-top:15px">
                    <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        <div class="icon fa-solid fa-gauge-high fa-xl text-center me-2 d-flex align-items-center justify-content-center"></div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="?page=masuk">
                        <div class="icon fa-solid fa-circle-down fa-xl text-center me-2 d-flex align-items-center justify-content-center"></div>
                        <span class="nav-link-text ms-1">Kas Masuk</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="?page=keluar">
                        <div class="icon fa-solid fa-circle-up fa-xl text-center me-2 d-flex align-items-center justify-content-center"></div>
                        <span class="nav-link-text ms-1">Kas Keluar</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="?page=rekap">
                        <div class="icon fa-solid fa-book fa-xl text-center me-2 d-flex align-items-center justify-content-center"></div>
                        <span class="nav-link-text ms-1">Rekapitulasi Kas</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="?page=user">
                        <div class="icon fa-solid fa-circle-info fa-xl text-center me-2 d-flex align-items-center justify-content-center"></div>
                        <span class="nav-link-text ms-1">Suport</span>
                    </a>
                    </li>
            </div>
            </aside>

            <!-- Home/main content -->  
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Aplikasi</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">My Wallet</h6>
                    </nav>
                    <marquee behavior="" direction="" style="font-size: 23px; color: white;">
                        <h4 class="font-weight-bolder text-white mb-1">Selamat Datang <?php echo ucwords($_SESSION['username']); ?></h4>
                    </marquee>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center"
                                style="color: white;
                                        padding-top: 10px;
                                        float: right;
                                        font-size: 16px;">
                                        <a href="logout.php" class="btn btn-danger square-btn-adjust"
                                        title="Logout">Keluar</a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                </nav>


                <div class="container-fluid">
                            <?php
                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if($page == "masuk") {
                                if($aksi =="") {
                                    include 'page/kas_masuk/masuk.php';
                                } if($aksi =="hapus") {
                                    include 'page/kas_masuk/hapus.php';
                                }
                            } elseif ($page == "keluar") {
                                if($aksi =="") {
                                    include 'page/kas_keluar/keluar.php';
                                } if($aksi =="hapus") {
                                include 'page/kas_keluar/hapus.php';
                                }
                            } elseif ($page == "rekap") {
                                if($aksi =="") {
                                    include 'page/rekap/rekap.php';
                                }
                            } elseif ($page == "user") {
                                if($aksi =="") {
                                    include 'page/user/user.php';
                                }
                            } elseif ($page == "") {                           
                                    include 'dashboard.php';
                                }                       
                            ?>
                       
                </div>

            </main>
            <!--   Core JS Files   -->
            <script src="js/bootstrap.min.js"></script>
            <script src="assets/js/perfect-scrollbar.min.js"></script>
            <script src="assets/js/smooth-scrollbar.min.js"></script>
            <script src="assets/js/chartjs.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/main.min.js"></script>
            <script>
                var ctx1 = document.getElementById("chart-line").getContext("2d");

                var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

                gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
                gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
                new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "Saldo",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [500.000, 3780.000, 1436.000, 1360.000, 2769.000, 800.000, 4530.000, 2230.000, 4140.000],
                    maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
                });
            </script>
            <script>
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
            </script>
            


                    

    
        </body>
        </html>