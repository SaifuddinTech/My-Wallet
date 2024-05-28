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
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Uang Masuk</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href="assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link href="assets/fontawesome-v6.4.0/css/all.min.css" rel="stylesheet" />  

        
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="padding:23px">
                    <div class="row" style="padding:0px 25px 15px 25px">
                        <div class="col-6 d-flex align-items-center" >
                            <h5 class="mb-0">Data Uang Masuk</h5>
                        </div>
                        <div class="col-6 text-end">
                            <span title="Tambah Data">
                                <button type="button" class="btn bg-success btn-block" data-bs-toggle="modal" data-bs-target="#tambahdatamasuk">
                                <b class="text-white">+ Tambah</b>
                                </button>
                            </span>
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
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Jumlah</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'masuk' ");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                        <tr class="odd gradeX">
                                            <td class=" px-2 py-1 text-center">
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
                                                <a id="edit_data" data-bs-toggle="modal" data-bs-target="#edit" data-id="<?php echo $data['kode']; ?>" data-ket="<?php echo $data['keterangan']; ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah']; ?>" class="btn btn-warning btn-md" Style="margin-bottom:0px" title="Ubah Data"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode'];?>" class="btn btn-danger btn-md" Style="margin-bottom:0px" title="Hapus Data"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    $total = $total+$data['jumlah'];
                                    } 
                                ?>
                                </tbody>
                                <tr>
                                    <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Uang Masuk :</td>
                                    <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: left; font-size: 17px; color: maroon;">Laporan Data Uang Masuk</td>
                                    <td>
                                        <center><a href="page/kas_masuk/laporan_masuk.php" target="_blank"><button class="btn btn-primary btn-sm" > CETAK</button></a></center>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- Tabel -->

                        <!--  Halaman Tambah-->
                        <div class="col-md-4">
                            <div class="modal fade" id="tambahdatamasuk" tabindex="-1" role="dialog" aria-labelledby="Tambah_Data_Kas_Masuk" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h4 class="font-weight-bolder text-primary text-gradient" id="myModalLabel">Form Tambah Data</h4>
                                                    <p class="mb-0">Data Uang Masuk</p>
                                                </div>
                                                <div class="card-body pb-3">
                                                    <form role="form text-left" method="POST">
                                                        <label>Kode</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode">
                                                        </div>
                                                        <label>Keterangan</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" rows="3" name="ket" placeholder="Masukkan Keterangan">
                                                        </div>
                                                        <label>Tanggal</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form-control" name="tgl">
                                                        </div>
                                                        <label>Jumlah</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control" name="jml" placeholder="Masukkan Nominal">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--aksi-->
                            <?php 
                                if(isset($_POST['simpan'])) {
                                    $kode = $_POST['kode'];
                                    $tgl = $_POST['tgl'];
                                    $ket = $_POST['ket'];
                                    $jml = $_POST['jml'];

                                    $sql = mysqli_query($koneksi, "INSERT INTO kas (kode, keterangan, tgl, jumlah, jenis, keluar) VALUES ('$kode', '$ket', '$tgl', '$jml', 'masuk', 0)");

                                    if($sql) {

                                        echo "
                                            <script>
                                            alert('Data Berhasil Ditambahkan');
                                            document.location.href = '';
                                            </script>";   
                                    }
                                }
                            ?>
                            <!--aksi-->
                        </div>
                        <!-- Akhir Halaman Tambah -->

                        <!-- Halaman Ubah -->
                        <div class="col-md-4">
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="Ubah_Data_Kas_Masuk" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card card-plain">
                                                    <div class="card-header pb-0 text-left">
                                                        <h4 class="font-weight-bolder text-primary text-gradient" id="myModalLabel">Form Ubah Data</h4>
                                                        <p class="mb-0">Data Uang Masuk</p>
                                                    </div>
                                                    <div class="card-body pb-3" id="modal_edit">
                                                        <form role="form text-left" method="POST">
                                                            <label>Kode</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode" id="kode" readonly>
                                                            </div>
                                                            <label>Keterangan</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" rows="3" name="ket" placeholder="Masukkan Keterangan" id="ket">
                                                            </div>
                                                            <label>Tanggal</label>
                                                            <div class="input-group mb-3">
                                                                <input type="date" class="form-control" name="tgl" id="tgl">
                                                            </div>
                                                            <label>Jumlah</label>
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" name="jml" placeholder="Masukkan Nominal" id="jml">
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                        if(isset($_POST['ubah'])) {
                                        $kode = $_POST['kode'];
                                        $ket = $_POST['ket'];
                                        $tgl = $_POST['tgl'];
                                        $jml = $_POST['jml'];
                                        $sql = mysqli_query($koneksi, "UPDATE kas SET keterangan = '$ket', tgl = '$tgl', jumlah = '$jml', jenis = 'masuk', keluar = 0 WHERE kode = '$kode' ");
                                        if($sql) {
                                            echo "
                                                <script>
                                                alert('Data Berhasil Diubah');
                                                document.location.href = '';
                                                </script>";     
                                        }
                                    }
                                ?>                
                        </div>
                        <!-- Akhir Halaman Ubah -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    Copyright © 2023 All rights reserved By <a href="https://www.instagram.com/n.saifuddinnn/" target="_blank"><b>Nur Saifuddin</b></a>
                </div>
            </div>
        </div>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="assets/js/perfect-scrollbar.min.js"></script>
        <script src="assets/js/smooth-scrollbar.min.js"></script>
        <script src="assets/js/chartjs.min.js"></script>
        <script src="assets/js/jquery-1.10.2.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

        <script type="text/javascript">
            $(document).on("click", "#edit_data", function() {
                var kode = $(this).data('id');
                var ket = $(this).data('ket');
                var tgl = $(this).data('tgl');
                var jml = $(this).data('jml');

                $("#modal_edit #kode").val(kode);
                $("#modal_edit #ket").val(ket);
                $("#modal_edit #tgl").val(tgl);
                $("#modal_edit #jml").val(jml);

            })
        </script>

    </body>

    </html>