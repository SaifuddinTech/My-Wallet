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
	<title>Contact Person</title>
</head>
<body>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="fuddin" style="padding-top:30px">
                    <center>
                        <a href="#" target="_blank">
                            <img src="img/fuddin.png" alt="" width="23%"  class="img-responsive">
                        </a>
                        <h6 style="font-size: 23px; margin-bottom:0px"> <b>Nur Saifuddin</b></h6>
                        <div class="sosmedpembuat">
                        <div class="row">
                        <div class="col-3">
                                <a href="https://www.instagram.com/n.saifuddinnn/">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center">
                                    <i class="fa-brands fa-instagram fa-2xl opacity-10" aria-hidden="true"></i>
                                </div>
                                </a>
                            </div>                   
                            <div class="col-3">
                                <a href="https://www.facebook.com/oksigen.kopong?_rdc=1&_rdr">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center">
                                    <i class="fa-brands fa-facebook-f fa-xl opacity-10" aria-hidden="true"></i>
                                </div>
                                </a>
                            </div>                   
                            <div class="col-3">
                                <a href="https://api.whatsapp.com/send?phone=6285334541652&#038;text=Jika%20butuh%20Bantuan%20atau%20Saran%2C%20bisa%20Hubungi%20Nomor%20ini%20*Nur Saifuddin*">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center">
                                    <i class="fa-brands fa-whatsapp fa-2xl opacity-10" aria-hidden="true"></i>
                                </div>
                                </a>
                            </div>                    
                            <div class="col-3">
                                <a href="#">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center">
                                    <i class="fa-brands fa-youtube fa-2xl opacity-10" aria-hidden="true"></i>
                                </div>
                                </a>
                            </div>                     
                        </div>
                        </div>
                    </center>
                </div>
            </div>
    
</body>
</html>