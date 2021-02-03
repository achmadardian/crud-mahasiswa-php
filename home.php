<!DOCTYPE html>
<html>
<head>
	<title>SIA Mercubuana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	
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
		<h2>Data Mahasiswa</h2>
		<hr>

		<!-- Koneksi -->
		<?php include ("koneksi.php"); ?>

		<!-- Cek Login -->
		<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:home_login.php?pesan=belum_login");
		}
		?>

		<?php
		$query = mysqli_query($koneksi, "select * from mahasiswa"); 
		?>

		<table class="table table-bordered table-hover table-sm">
			<thead class="thead bg-light">
		      	<tr>
			        <th>No</th>
			        <th>Nim</th>
			        <th>Nama</th>
			        <th>Jenis Kelamin</th>
			        <th>Jurusan</th>
			        <th>Opsi</th>
		      	</tr>
		   	</thead>

		   	<tbody>
		   		<tr>
			   		<?php 
			   		$x = 1;
			   		while ($data = mysqli_fetch_array($query)):?>
			   			<td><?php echo $x++; ?></td>
			   			<td><?php echo $data['nim']; ?></td>
			   			<td><?php echo $data['nama']; ?></td>
			   			<td><?php echo $data['jenis_kelamin']; ?></td>
			   			<td><?php echo $data['jurusan']; ?></td>
			   			<td>
							<a href="update.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary btn-sm">UPDATE</a>
							<a href="delete.php?nim=<?php echo $data['nim']; ?>" class="btn btn-danger btn-sm">HAPUS</a>
						</td>
		   		</tr>

		   		 <?php endwhile; ?>
		   	</tbody>
		</table>
	</div>

	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/popper/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>