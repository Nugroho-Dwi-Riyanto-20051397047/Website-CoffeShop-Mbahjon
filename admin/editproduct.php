<?php
include('header.php');
?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link " aria-current="page" href="dashboard.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ml-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="order.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Orders</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="product.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ml-2">Products</span>
                          </a>
                        </li>
                        
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="product.php">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
                <h1 class="h2">Edit Product Mbahjon</h1>
                <?php
                // memanggil file koneksi.php untuk membuat koneksi
                include '../config.php';

                // mengecek apakah di url ada nilai GET id
                if (isset($_GET['id'])) {
                    // ambil nilai id dari url dan disimpan dalam variabel $id
                    $id = ($_GET["id"]);

                    // menampilkan data dari database yang mempunyai id=$id
                    $query = "SELECT * FROM menu WHERE id_menu='$id'";
                    $result = mysqli_query($koneksi, $query);
                    // jika data gagal diambil maka akan tampil error berikut
                    if(!$result){
                    die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }
                    // mengambil data dari database
                    $data = mysqli_fetch_assoc($result);
                    // apabila data tidak ada pada database maka akan dijalankan perintah ini
                    if (!count($data)) {
                        echo "<script>alert('Data tidak ditemukan');window.location='product.php';</script>";
                    }
                } else {
                    // apabila tidak ada data GET id pada akan di redirect ke index.php
                    echo "<script>window.location='product.php';</script>";
                }         
                ?>
                <form method="post" action="process_editproduct.php" enctype="multipart/form-data">
                     <!-- menampung nilai id produk yang akan di edit -->
                 <input name="id" value="<?php echo $data['id_menu']; ?>"  hidden />
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name Product</label>
                    <input class="form-control" type="text" placeholder="Input Your Product" aria-label="default input example" name="name" value="<?php echo $data['deskripsi_menu']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input class="form-control" type="number" placeholder="Input Price" aria-label="default input example" name="price" value="<?php echo $data['harga'] ?>">
                </div>
                <div class="mb-3">
                <label for="formFileSm" class="form-label">Upload Image Product</label><br>
                <img src="../Image/<?php echo $data['gambar_menu']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" >
                <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak merubah gambar produk</i>
                <br>
                </div>
                <div class="mb-3">
                <input type="submit" class="btn btn-primary">
                </div>
                </form>
                
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2021 <a href="">Kelompok 5</a></span>
                </footer>
            </main>
<?php
include('footer.php');
?> 