<?php 
	include '../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Uang Masuk</title>
	<link rel="icon" href="../../img/logoku.png">
	<hr/>
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
	<h3>Laporan Uang Masuk</h3>
	<h2>MY WALLET SISTEM KAS</h2>
	</center>
	<hr/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>Kode</th>
		<th>Keterangan</th>
		<th>Tanggal</th>
		<th>Jenis</th>
		<th>Jumlah</th>
	</tr>
	<?php 
	$data = $koneksi -> query("SELECT * FROM kas WHERE jenis='masuk'");
	$i=1;
	$total=0;
	while ($dta = mysqli_fetch_assoc($data)) : 
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['kode'] ?></td>
		<td align="center"><?= $dta['tgl'] ?></td>
		<td align=""><?= $dta['keterangan'] ?></td>
		<td align="center"><?= $dta['jenis'] ?></td>
		<td align="right">Rp. <?php echo number_format($dta['jumlah']).",-" ?></td>
	</tr>
<?php
	$total = $total+$dta['jumlah']; 
?>

	<?php $i++; ?>
<?php endwhile; ?>
	<tr>
       <td colspan="5" style="text-align: left; font-size: 17px; color: maroon;">Total Uang Masuk :</td>
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

	<a href="#" onclick="window.print();"><button  class="print">CETAK</button></a>
</body>
</html>

