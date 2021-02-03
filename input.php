<!DOCTYPE html>
<html>
<head>
	<title>SIA Mercubuana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-info navbar-dark ">
		<div class="container">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="home.php">Beranda</a>
		    </li>
		    <li class="nav-item active">
		      <a class="nav-link" href="input.php">Tambah Data</a>
		    </li>
		  </ul>
		  <a href="logout.php" class="btn btn-warning btn-sm">Logout</a>
		</nav>
	</div>

	<div class="container">
		<br>
		<h2>Tambah Data Mahasiswa</h2>
		<hr>

		<!-- Koneksi -->
		<?php include 'koneksi.php'; ?>

		<!-- Cek Login -->
		<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:home_login.php?pesan=belum_login");
		}
		?>

		<!-- Input Ke Mahasiswa -->
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, jurusan) VALUES('$nim', '$nama', '$jenis_kelamin', '$jurusan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="input.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>

		<!-- FORM INPUT -->
		<form action="input.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL">TEKNIK SIPIL</option>
						<option value="TEKNIK MESIN">TEKNIK MESIN</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="TAMBAH">
					<a href="home.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
	</div>

	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/popper/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>