<?php
                // memanggil file koneksi.php untuk melakukan koneksi database
                include '../config.php';
                // if(isset($_POST['submit'])){
                    // membuat variabel untuk menampung data dari form
                $name          = $_POST['name'];
                $price         = $_POST['price'];
                $image = $_FILES['image']['name'];


                //cek dulu jika ada gambar produk jalankan coding ini
                if($image != "") {
                $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
                $x = explode('.', $image); //memisahkan nama file dengan ekstensi yang diupload
                $ekstensi = strtolower(end($x));
                $file_tmp = $_FILES['image']['tmp_name'];   
                $angka_acak     = rand(1,999);
                $nama_gambar_baru = $angka_acak.'-'.$image; //menggabungkan angka acak dengan nama file sebenarnya
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                                move_uploaded_file($file_tmp, '../Image/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                                // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                                $query = "INSERT INTO menu (gambar_menu, deskripsi_menu, harga) VALUES ('$nama_gambar_baru', '$name', '$price')";
                                $result = mysqli_query($koneksi, $query);
                                // periska query apakah ada error
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    //tampil alert dan akan redirect ke halaman index.php
                                    //silahkan ganti index.php sesuai halaman yang akan dituju
                                    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
                                }

                            } else {     
                            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png atau jpeg.');window.location='tambah_produk.php';</script>";
                            }
                } else {
                $query = "INSERT INTO menu (gambar_menu, deskripsi_menu, harga) VALUES (null,'$name', '$price')";
                                $result = mysqli_query($koneksi, $query);
                                // periska query apakah ada error
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    //tampil alert dan akan redirect ke halaman index.php
                                    //silahkan ganti index.php sesuai halaman yang akan dituju
                                    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
                                }
                }
                // }
                ?>