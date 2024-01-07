<?php
require 'koneksi.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Keluar</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Barang Keluar</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="barang_masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="barang_keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Laporan Barang
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Reza
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Keluar</h1>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Barang Keluar
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="datatablesSimple">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang Keluar</th>
                                            <th>Kode Barang</th>
                                            <th>Tanggal Keluar Barang</th>
                                            <th>Jumlah barang Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuadata = mysqli_query($conn, "SELECT*FROM barang_keluar");
                                        $i=1;
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            $kodebarangkeluar = $data['kode_barang_keluar'];
                                            $kodebarang = $data['kode_barang'];
                                            $tanggalkeluar= $data['tanggal_barang_keluar'];
                                            $stok = $data['jumlah_barang_keluar'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$kodebarangkeluar;?></td>
                                            <td><?=$kodebarang;?></td>
                                            <td><?=$tanggalkeluar;?></td>
                                            <td><?=$stok;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$kodebarang;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$kodebarang;?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$kodebarang;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Barang Keluar</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Jumlah Stok Keluar
                                                                <input type="number" name="stokkeluar" value="<?=$stok;?>" class="form-control" required>
                                                                <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">
                                                                <input type="hidden" name="kodebarangkeluar" value="<?=$kodebarangkeluar;?>"><br>
                                                                <button type="submit" name="updatebarangkeluar" class="btn btn-warning">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$kodebarang;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Barang Keluar</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data barang keluar dengan kode barang <?=$kodebarang;?> dengan jumlah <?=$stok;?>?
                                                                <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">
                                                                <input type="hidden" name="kodebarangkeluar" value="<?=$kodebarangkeluar;?>"><br>
                                                                <br>
                                                                <button type="submit" name="hapusbarangkeluar" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- Modal Barang Keluar -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang Keluar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
            <div class="modal-body">
            Pilih Kode Barang<br>
                <select name="kodenya" class="form-control">
                    <?php
                        $ambilsemuadata = mysqli_query($conn, "SELECT*FROM data_barang");
                        while($fetcharray = mysqli_fetch_array($ambilsemuadata)){
                            $kodebarangnya = $fetcharray['kode_barang'];      
                    ?>

                    <option value ="<?=$kodebarangnya;?>"><?=$kodebarangnya;?></option>
                    <?php
                        }
                    ?>
                </select><br>
                
                Masukan Jumlahnya (quantity)<br><input type="number" name="stock" placeholder="Masukan jumlah Stock" class="form-control" required><br>
                
                <button type="submit" name="barangkeluar" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>
</html>
