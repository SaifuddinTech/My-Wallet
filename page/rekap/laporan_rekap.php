<?php 
	include '../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Rekap</title>
	<link rel="icon" href="../../img/logoku.png">
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<center>
	<h3>Laporan Data Rekapitulasi</h3>
	<h2>MY WALLET SISTEM KAS</h2>
	</center>
	<hr/>
	Tanggal <?= $_GET['tgl1']."  -  ".$_GET['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>Kode</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Masuk</th>
		<th>Jenis</th>
		<th>Keluar</th>
	</tr>
	<?php 
	$uang = $koneksi -> query("SELECT * FROM kas
							WHERE tgl BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'");
	$i=1;
	$total = 0;
	$masuk = 0;
	$klr = 0;
	$saldo_akhir = 0;
	while($dta=mysqli_fetch_assoc($uang)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['kode'] ?></td>
		<td align="center"><?= $dta['tgl'] ?></td>
		<td align=""><?= $dta['keterangan'] ?></td>
		<td align="right">Rp. <?php echo number_format($dta['jumlah']).",-" ?></td>
		<td align="center"><?= $dta['jenis'] ?></td>
		<td align="right">Rp. <?php echo number_format($dta['keluar']).",-" ?></td>
	</tr>
	<?php $i++; ?>
	<?php $masuk += $dta['jumlah']; ?>
	<?php $klr += $dta['keluar']; ?>
	<?php $total += $dta['jumlah'] + $dta['keluar']; ?>
	<?php $saldo_akhir = $masuk - $klr;  ?>

<?php endwhile; ?>
	<tr>
       <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Uang :</td>
       <td style="font-size: 17px; text-align: left; "><font style="color: green;"><?php echo " Rp." . number_format($masuk).",-"; ?></font></td>
       <td></td>
       <td style="font-size: 17px; text-align: left; "><font style="color: green;"><?php echo " Rp." . number_format($klr).",-"; ?></font></td>
    </tr>
	<tr>
       <td colspan="5" style="text-align: left; font-size: 17px; color: maroon;">Total Saldo Akhir :</td>
       <td style="font-size: 17px; text-align: left; "><font style="color: green;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></td>
    </tr>
    <tr>
       <td colspan="5" style="text-align: left; font-size: 17px; color: maroon;">Total Rekapitulasi :</td>
       <td style="font-size: 17px; text-align: left; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
    </tr>
	</table>
	<br>

<style type="text/css">
	.print{
			background-color: #4CAF50;
  			color: white;
  			padding: 12px 18px;
  			margin: 8px 0;
  			border: none;
  			border-radius: 4px;
  			cursor: pointer;
	}
</style>

	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>