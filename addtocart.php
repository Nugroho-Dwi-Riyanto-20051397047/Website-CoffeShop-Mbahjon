<?php
                // memanggil file koneksi.php untuk melakukan koneksi database
                include 'config.php';
                if(isset($_POST['submit'])){
                    // membuat variabel untuk menampung data dari form
                $id_menu          = $_POST['id_menu'];
                $id_user         = $_POST['id_user'];
                $qty        = $_POST['qty'];
                
                $query = "INSERT INTO keranjang (id_menu, id_user, qty) VALUES ('$id_menu', '$id_user', '$qty')";
                $result = mysqli_query($koneksi, $query);
                // periska query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Product berhasil dimasukkan keranjang.');window.location='index.php#menu';</script>";
                }
                }
                ?>