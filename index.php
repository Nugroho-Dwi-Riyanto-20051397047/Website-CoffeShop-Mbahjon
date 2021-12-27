
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Awesome CSS -->
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- CSS Home -->
    <link rel="stylesheet" href="resource/css/home.css">


    <title>Mbah John</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #3c623d;">
        <div class="container">
            <a class="navbar-brand" href="#">MBAH JOHN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#menu">Menu</a>
                    <a class="nav-link" href="#about">About Us</a>
                    <?php
                        // $_SESSION['status'] = "";

                        session_start();

                        if($_SESSION['status']!="sudah_login"){
                        echo " <a class='nav-link' href='Login.php'>Login</a>";
                        } 
                        else{
                        //     echo " <a class='nav-link' href=''>".$_SESSION['email']."</a>";
                        // }
                    ?>
                    <div class="dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['email']; ?>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="cart.php?id_user=<?php echo $_SESSION['id_login']; ?>"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Home -->
    <section>
        <div class="circle"></div>
        <div class="content">
            <div class="textBox">
                <h2>Ngopi enak gak harus mahal<br>karna <span> MBAH JHON</span> adalah<br>tepat untuk mencari inspirasi</h2>
            </div>
            <div class="imgBox">
                <img src="Image/img1.png" class="kopi1 w-100">
            </div>
        </div>
        <ul class="kopi">
            <li><img src="Image/img1.png" onclick="imgSlider('Image/img1.png');changeCricleColor('#017143')"></li>
            <li><img src="Image/Kopi2.png" onclick="imgSlider('Image/Kopi2.png');changeCricleColor('#064635')"></li>
            <li><img src="Image/img3.png" onclick="imgSlider('Image/img3.png');changeCricleColor('#F0BB62')"></li>
        </ul>
    </section>

    <script src="resource/js/Home.js"></script>
    <!-- Akhir Home -->

    <!-- Menu -->
    <section class="pt-5" id="menu">

        <div class="container px-4 px-lg-5 mt-5" >

            <div class="col text-center pb-4">
                <h1 style="color: #3c623d;"><b>MENU</b></h1>
            </div>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                    include('config.php');
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM menu ORDER BY id_menu ASC";
                    $result = mysqli_query($koneksi, $query);
                    //mengecek apakah ada error ketika menjalankan query
                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }

                    //buat perulangan untuk element tabel dari data mahasiswa
                    // $no = 1; //variabel untuk membuat nomor urut
                    // hasil query akan disimpan dalam variabel $data dalam bentuk array
                    // kemudian dicetak dengan perulangan while
                    while($row = mysqli_fetch_assoc($result))
                    {
            ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="Image/<?php echo $row['gambar_menu']?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-2">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $row['deskripsi_menu'] ?></h5>
                                <!-- Product price-->
                                Rp. <?php echo $row['harga'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <form action="addtocart.php" method="post">
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <input name="id_menu" value="<?php echo $row['id_menu']; ?>"  hidden />
                                <input name="id_user" value="<?php echo $_SESSION['id_login']; ?>"  hidden />
                                <input name="qty" value="0"  type="number" class="w-50 mb-3" />
                                <br>
                                <!-- <a class="btn btn-outline-dark mt-auto" href="#">Buy</a> -->
                                <input type="submit" value="Buy" name="submit" class="btn btn-success btn-outlne-dark mt-auto">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
               <?php
                    }
               ?>
            </div>
        </div>
    </section>
    <!-- Akhir Menu -->

    <!-- About Us -->
    <div class="container" id="about">
        <div class="row pb-2 mt-1 mb-3">
            <div class="col text-center">
                <h1 style="color: #3c623d;"><b>ABOUT US</b></h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md mb-3">
                <img src="Image/Artboard 1.png" alt="Kopi" width="460">
            </div>

            <div class="col-md mb-3 p-3" style="background-color: #3c623d;">
                <h3 style="color: white;">Apa yang membuat kopi kami istimewah?</h3>
                <br>
                <p style="font-family: Times New Roman; font-size: 20px; color: white;">
                    Kopi kami terbuat dari bahan pilihan yang menjaga kualitas dan rasa. Kami memiliki perkebunan kopi sendiri yang di olah oleh Para Ahli kopi, Kami memiliki berbagai menu kopi yang akan membuat lidah anda menikmati citra rasa kopi yang fresh. Kopi kami tidak hanya memanjakan lidah anda tapi juga memanjakan tubuh anda. Kopi hitam adalah minuman yang berasal dari pengolahan dan penggalian biji kopi. Kata kopi pertama kali muncul dalam bahasa Arab, dengan nama Qahwah yang berarti kekuatan. Ini wajar kopi hitam adalah minuman elit. Ini adalah istilah yang muncuk untuk kopi dimasa lalu. Belanda dan Prancis serta Inggris adalah penguasa pasar kopi pada tahun 1600-an.
                </p>
            </div>
        </div>
    </div>
    <!-- Akhir About Us -->

    <!-- Contact -->
    <div class="container-fluid">
        <div class="row pt-5 mt-3 mb-3">
            <div class="col text-center">
                <h1 style="color: #3c623d;"><b>CONTACT</b></h1>
            </div>
        </div>

        <div class="row pb-5 mb-5">
            <div class="col-md text-end">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.69844583339!2d112.7653257353303!3d-7.275113562519781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa2d7b0ce529%3A0x5b7099b55205fd8e!2sJl.%20Kalidami%20No.52-A%2C%20RT.001%2FRW.10%2C%20Mojo%2C%20Kec.%20Gubeng%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060285!5e0!3m2!1sen!2sid!4v1639285646300!5m2!1sen!2sid" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md text-center" style="margin-top: 150px">
                <h2 style="color: #3c623d;"><b>Social Media</b></h2>
                <br>
                <a href="https://www.facebook.com/iqbal.hariosyahputra/"> <i class="fab fa-facebook-square fa-3x"></i></a>
                <a href="https://wa.me/628814998151"><i class="fab fa-whatsapp-square fa-3x"></i></a>
                <a href="https://www.instagram.com/iqbal_hario16/"><i class="fab fa-instagram-square fa-3x"></i></a>
            </div>
        </div>
    </div>
    <!-- Akhir Contact -->

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #3c623d;">
            © 2020 Copyright:
            <a class="text-dark">Kelompok 5</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Akhir Footer -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>