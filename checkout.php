<?php
                // memanggil file koneksi.php untuk melakukan koneksi database
                include 'config.php';
                if(isset($_POST['submit'])){
                    // membuat variabel untuk menampung data dari form
                $harga          = $_POST['harga'];
                $qty         = $_POST['qty'];
                $subtotal        = $_POST['subtotal'];
                $id_menu          = $_POST['id_menu'];
                $id_user         = $_POST['id_user'];
                $tgl = date("Y-m-d h:i:s");
                $max = "SELECT max(`id_pembayaran`) from pembayaran";
                // echo count(array($id_menu));
                $query = "INSERT INTO pembayaran (id_pembayaran, id_user , tgl_pembayaran, total_pembayaran) VALUES ('$max+1', '$id_user', '$tgl', '$subtotal')";
                $result = mysqli_query($koneksi, $query);

                // for ($i=0; $i < count($id_menu); $i++) {
                //     $query2 = "INSERT INTO transaksi (id_menu, id_pembayaran , harga, qty) VALUES ('$id_menu[$i]', '$max+1', '$harga[$i]', '$qty[$i]')";
                //     $result2 = mysqli_query($koneksi, $query2);
                    
                // }
                // periska query apakah ada error
                
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                } else {
                    
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Product berhasil di Checkout.');window.location='index.php';</script>";
                    }
                }

                    // if(!$result && !$result2){
                    //     die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    //         " - ".mysqli_error($koneksi));
                    // } else {
                        
                    //     //tampil alert dan akan redirect ke halaman index.php
                    //     //silahkan ganti index.php sesuai halaman yang akan dituju
                    //     echo "<script>alert('Product berhasil di Checkout.');window.location='index.php';</script>";
                    //     }
                    
                
                ?>