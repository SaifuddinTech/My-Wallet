<?php 
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$sql = mysqli_query($koneksi, "SELECT * FROM kas");
while($data=mysqli_fetch_assoc($sql)) {

    $jml = $data['jumlah'];
    $total_masuk = $total_masuk+$jml;

    $jml_keluar = $data['keluar'];
    $total_keluar = $total_keluar+$jml_keluar;

    $total = $total_masuk-$total_keluar;
}
?>

        <!-- Dashboard -->
    <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Kalender</p> <br>
                                <div class="font-weight-bolder" style="color: black;
                                float: left;
                                font-size: 20px;">Tanggal <br>
                                <?php date_default_timezone_set('Asia/Jakarta');
                                echo date('d-m-Y'); ?> &nbsp; &nbsp;
                                </div>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-calendar-days text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Kas Masuk</p> <br>
                                <h5 class="font-weight-bolder">
                                    <?php echo "Rp. " . number_format($total_masuk); ?>,-
                                </h5>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <a href="?page=masuk">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fa-solid fa-arrow-right-to-bracket fa-rotate-90 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Kas Keluar</p> <br>
                                <h5 class="font-weight-bolder"> 
                                    <?php echo "Rp. " . number_format($total_keluar); ?>,-
                                </h5>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <a href="?page=keluar">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fa-solid fa-arrow-up-from-bracket text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Saldo Akhir</p> <br>
                                <h5 class="font-weight-bolder">
                                    <?php echo "Rp. " . number_format($total); ?>,-
                                </h5>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <a href="?page=rekap">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="fa-solid fa-sack-dollar text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Grafik Rekapitulasi</h6>
                        <p class="text-sm mb-0">
                            <i class="fa-solid fa-chart-line" style="color: #69ed31;"></i>
                            <span class="font-weight-bold">  
                            <?php date_default_timezone_set('Asia/Jakarta');
                                echo date('Y'); ?> &nbsp; &nbsp;
                            </span>
                        </p>
                        </div>
                        <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                        </div>
                    </div>
                </div>
    </div>

                <!-- Dashboard -->