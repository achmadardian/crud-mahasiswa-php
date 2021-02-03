<!DOCTYPE html>
<html>
<head>
	<title>SIA Mercubuana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/popper.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<br><br>

		<?php include 'koneksi.php'; ?>

		<!-- Cek Login -->
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo '<script>alert("Login gagal username atau password salah.")</script>';
			}else if($_GET['pesan'] == "logout"){
				echo '<script>alert("Berhasil Logout.")</script>';
			}else if($_GET['pesan'] == "belum_login"){
				echo '<script>alert("Anda harus login untuk masuk.")</script>';
			}
		}
		?>



		<div class="container">
			<div class="kotak_login">
			<p class="tulisan_login">Admin Login</p>
	 
				<form action="login.php" method="post">
					<label>Username</label>
					<input type="text" name="username" class="form_login" placeholder="username">
		 
					<label>Password</label>
					<input type="text" name="password" class="form_login" placeholder="password ..">
		 
					<input type="submit" class="tombol_login" value="LOGIN">
				</form>
		
			</div>	
		</div>


</body>
</html>