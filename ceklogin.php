<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nimnip = $_POST['nimnip'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE nimnip='$nimnip' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="tatausaha"){

		// buat session login dan username
		$_SESSION['nimnip'] = $nimnip;
		$_SESSION['level'] = "tatausaha";
		// alihkan ke halaman dashboard admin
		header("location:halaman_tatausaha.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="mahasiswa"){
		// buat session login dan username
		$_SESSION['nimnip'] = $nimnip;
		$_SESSION['level'] = "mahasiswa";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_mahasiswa.php");

	// cek jika user login sebagai pengurus
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>
