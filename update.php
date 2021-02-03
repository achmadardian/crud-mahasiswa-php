<!DOCTYPE html>
<html>
<head>
	<title>SIA Mercubuana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/popper.js"></script>
	<script src="bs/js/bootstrap.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-info navbar-dark">
		<div class="container">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="home.php">Beranda</a>
		    </li>
		    <li class="nav-item active">
		      <a class="nav-link" href="input.php">Tambah Data</a>
		    </li>
		  </ul>
		  <a href="logout.php" class="btn btn-warning btn-md">Logout</a>
		</nav>
	</div>

	<div class="container">
		<br>
		<h2>Update Data Mahasiswa</h2>
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

		<?php
		//jika sudah mendapatkan parameter GET nim dari URL
		if(isset($_GET['nim'])){
			//membuat variabel $nim untuk menyimpan nim dari GET nim di URL
			$nim = $_GET['nim'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan nim = $nim
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">nim tnimak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			
			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Data Berhasil di Update."); document.location="update.php?nim='.$nim.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="update.php?nim=<?php echo $nim; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" value="<?php echo $data['nim']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" <?php if($data['jenis_kelamin'] == 'LAKI-LAKI'){ echo 'checked'; } ?> required>
						<label class="form-check-label">Laki-Laki</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" <?php if($data['jenis_kelamin'] == 'PEREMPUAN'){ echo 'checked'; } ?> required>
						<label class="form-check-label">Perempuan</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="TEKNIK INFORMATIKA" <?php if($data['jurusan'] == 'TEKNIK INFORMATIKA'){ echo 'selected'; } ?>>TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL" <?php if($data['jurusan'] == 'TEKNIK SIPIL'){ echo 'selected'; } ?>>TEKNIK SIPIL</option>
						<option value="TEKNIK MESIN" <?php if($data['jurusan'] == 'TEKNIK MESIN'){ echo 'selected'; } ?>>TEKNIK MESIN</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="home.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
	</div>

</body>
</html>