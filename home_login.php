<!DOCTYPE html>
<html>
<head>
	<title>SIA Mercubuana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

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

	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/popper/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>