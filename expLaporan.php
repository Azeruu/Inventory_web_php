<?php
require 'koneksi.php';
require 'cek.php';
?>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Barang</h2>
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					<table class="table table-bordered" id="ekspordata" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadata = mysqli_query($conn, "SELECT*FROM data_barang");
                                        $i=1;
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            $namabarang = $data['nama_barang'];
                                            $kodebarang = $data['kode_barang'];
                                            $stok = $data['stok'];

                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$kodebarang;?></td>
                                            <td><?=$stok;?></td>
                                        </tr>
                                        

                                        <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                    
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang Masuk</th>
                                                <th>Kode Barang </th>
                                                <th>Stok Barang Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadata = mysqli_query($conn, "SELECT*FROM barang_masuk ");
                                            $i=1;
                                            while($data=mysqli_fetch_array($ambilsemuadata)){
                                                $kodebarangmasuk = $data['kode_barang_masuk'];
                                                $kodebarang = $data['kode_barang'];
                                                $barangmasuk = $data['jumlah_barang_masuk'];

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$kodebarangmasuk?></td>
                                                <td><?=$kodebarang?></td>
                                                <td><?=$barangmasuk;?></td>
                                            </tr>
                                            

                                            <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang Keluar</th>
                                                <th>Kode Barang </th>
                                                <th>Jumlah Barang Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadata = mysqli_query($conn, "SELECT*FROM barang_keluar ");
                                            $i=1;
                                            while($data=mysqli_fetch_array($ambilsemuadata)){
                                                $kodebarangkeluar = $data['kode_barang_keluar'];
                                                $kodebarang = $data['kode_barang'];
                                                $barangkeluar = $data['jumlah_barang_keluar'];

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$kodebarangkeluar?></td>
                                                <td><?=$kodebarang?></td>
                                                <td><?=$barangkeluar;?></td>
                                            </tr>
                                            

                                            <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                        </table>

				</div>
</div>
<script>
$(document).ready(function() {
    $('#ekspordata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>