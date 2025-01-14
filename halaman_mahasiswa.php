<!DOCTYPE html>
<html>
<head>
	<title>Halaman Mahasiswa</title>
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<?php include('navbar_mahasiswa.php');
	?>
	<?php include('bot.php');
	?>

</body>
</html>