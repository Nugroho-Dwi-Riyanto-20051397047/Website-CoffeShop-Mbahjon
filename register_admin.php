<?php
                    session_start();

                // memanggil file koneksi.php untuk melakukan koneksi database
                include 'config.php';
                // if(isset($_POST['submit'])){
                    // membuat variabel untuk menampung data dari form
                $email          = $_POST['email'];
                $password         = $_POST['password'];
                // $telp        = $_POST['telp'];
                
                $query = "INSERT INTO admin (email, password) VALUES ('$email', '$password')";
                $result = mysqli_query($koneksi, $query);
                // periska query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                } else {
                    //menyimpan session user, nama, status dan id login
                    // $_SESSION['email'] = $email;
                    // // $_SESSION['nama'] = $data['nama'];
                    // $_SESSION['status'] = "sudah_login";
                    // $_SESSION['id_login'] = $data['id'];
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Berhasil Register, Silahkan Login');window.location='admin.php';</script>";
                }
                // }
                ?>