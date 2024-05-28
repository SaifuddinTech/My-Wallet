<?php
include 'koneksi.php';


 if ( isset($_POST['daftar']) ) {
 	$username = $_POST['username'];
 	$password = $_POST['password'];
 	$nama = $_POST['nama'];

 	if($username=='' || $password=='' || $nama==''){
			?>
        <script type="text/javascript">
        alert('Form belum lengkap!!');
        document.location.href = 'daftar.php';
        </script>
    <?php
	}else{

 	$exec = mysqli_query($koneksi,"INSERT INTO tb_user(username,password,nama) Values ('$username','$password','$nama')");

 	if( $exec ){
 		echo "
 		<script>
 		alert('Anda Berhasil Daftar.... Silahkan Login dengan Akun Anda');
 		document.location.href = 'login.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('Gagal Daftar');
 		document.location.href = 'daftar.php';
 		</script>
 		";
 	}
 }
 }


?>