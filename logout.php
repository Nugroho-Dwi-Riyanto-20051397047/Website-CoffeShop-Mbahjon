<?php

 
// menghapus semua session
session_destroy();

 // mengaktifkan session
session_start();
$_SESSION['status'] = "";
// mengalihkan halaman login
header("location:index.php");
?>