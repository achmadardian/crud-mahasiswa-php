<?php
//include file config.php
include('koneksi.php');

//jika benar mendapatkan GET nim dari URL
if(isset($_GET['nim'])){
	//membuat variabel $nim yang menyimpan nilai dari $_GET['nim']
	$nim = $_GET['nim'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki nim yang sama dengan variabel $nim
	$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi nim=$nim
		$del = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="home.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="home.php";</script>';
		}
	}else{
		echo '<script>alert("nim tidak ditemukan di database."); document.location="home.php";</script>';
	}
}else{
	echo '<script>alert("nim tidak ditemukan di database."); document.location="home.php";</script>';
}

?>