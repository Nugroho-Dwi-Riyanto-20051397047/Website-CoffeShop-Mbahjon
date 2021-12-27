<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM admin where email='$email' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	$_SESSION['email'] = $email;
	// $_SESSION['nama'] = $data['nama'];
	$_SESSION['status'] = "sudah_login";
	// $_SESSION['id_login'] = $data['id'];
	header("location:admin/dashboard.php");
} else {
	header("location:admin.php?pesan=gagal login data tidak ditemukan.");
}
?>