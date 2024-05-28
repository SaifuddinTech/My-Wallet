<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekapitulasi Uang</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link href="assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="assets/fontawesome-v6.4.0/css/all.min.css" rel="stylesheet" /> 
    <style>
        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4" style="padding:23px">
                <div class="row" style="padding:0px 25px 15px 25px">
                    <div class="col-6 d-flex align-items-center" >
                        <h5 class="mb-0">Data Rekapitulasi Uang</h5>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <!-- Tabel -->
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">No.</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Keterangan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Masuk</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Jenis</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Keluar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center">
                                            <?php echo $no++; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $data['kode']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo date('d F Y', strtotime($data['tgl'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $data['keterangan']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['jumlah']).",-"; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $data['jenis']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['keluar']).",-"; ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    $total = $total+$data['jumlah'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                ?>
                            </tbody>

                            <tr>
                                <td colspan="4" style="text-align: left; font-size: 16px; color: maroon;">Total Uang Masuk :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: maroon;">Total Uang Keluar :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo " Rp." . number_format($total_keluar).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="5" style="text-align: left; font-size: 16px; color: red;">Saldo Akhir :</td>
                                <th style="font-size: 17px; text-align: right;"><font style="color: purple;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></th>
                            </tr>
                            <tr style="background-color: white">
                                <form action="page/rekap/laporan_rekap.php" method="GET" target="_blank" >
                                    <td colspan="4" style="text-align: left; font-size: 16px; color: maroon;">
                                    <b>Laporan Data Rekap</b>
                                    </td>
                                    <td>
                                        Mulai Tanggal <br><input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
                                    </td>
                                    <td>
                                        Sampai Tanggal <br><input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
                                    </td>
                                    <td>
                                        <center><button class="btn btn-primary btn-sm" type="submit" name="tampil">Cetak</button></center>
                                    </td>
                                </form>
                            </tr>
                        </table>
                    </div>

                    <div id="" class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                Copyright © 2023 All rights reserved By <a href="https://www.instagram.com/n.saifuddinnn/" target="_blank"><b>Nur Saifuddin</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>