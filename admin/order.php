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
                          <a class="nav-link active" href="order.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Orders</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="product.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ml-2">Products</span>
                          </a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="list_admin.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span class="ml-2">Admin List</span>
                          </a>
                        </li> -->
                        
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                    </ol>
                </nav>
                <h1 class="h2">History Order Mbahjon</h1>
                <!-- <a href="addproduct.php" class="btn btn-sm btn-success mr-4"><i class="fas fa-plus"></i> Tambah Menu</a> -->
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Order</th>
                        <!-- <th scope="col" colspan="">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include('../config.php');
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM pembayaran INNER JOIN USER ON user.id_user = pembayaran.id_user ORDER BY id_pembayaran ASC";
                    $result = mysqli_query($koneksi, $query);
                    //mengecek apakah ada error ketika menjalankan query
                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }

                    //buat perulangan untuk element tabel dari data mahasiswa
                    $no = 1; //variabel untuk membuat nomor urut
                    // hasil query akan disimpan dalam variabel $data dalam bentuk array
                    // kemudian dicetak dengan perulangan while
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['tgl_pembayaran']?></td>
                        <td>Rp. <?php echo $row['total_pembayaran']?></td>
                        <td>
                        
                       
                        </td>
                        <!-- <td></td> -->
                        </tr>
                        <!-- <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr> -->
                        <?php
                            $no++; //untuk nomor urut terus bertambah 1
                        }
                        ?>
                    </tbody>
                </table>
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2021 <a href=">Kelompok 5</a></span>
                </footer>
            </main>
<?php
include('footer.php');
?> 