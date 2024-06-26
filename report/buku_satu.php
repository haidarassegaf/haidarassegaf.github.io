<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Buku</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM buku WHERE id='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Manajemen Perpustakaan SMP AL ISLAM TAMAN</h2>
                        <h4>Jl Ketegan Barat II gang Baik RT. 03 RW. 01 <br> Kabupaten Sidoarjo, Kecamatan Taman, 61257</h4>
                        <hr>
                        <h3>DATA BUKU</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								<tr>
                                    <td>Judul Buku</td> <td><?= $data['judul_buku'] ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Nama Pengarang</td> <td><?= $data['nama_pengarang'] ?></td>
                                <tr>
                                    <td>Penerbit</td> <td><?= $data['penerbit'] ?></td>
                                </tr>
                                 <tr>
                                    <td>Tahun Terbit</td> <td><?= $data['tahun_terbit'] ?></td>
                                </tr>
                                 <tr>
                                    <td>Loker Buku</td> <td><?= $data['loker_buku'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor (Kode Buku/Jumlah Buku)</td> <td><strong><?= $data['kode_buku'] ?> - <?= $data['jumlah_buku'] ?></strong></td>
                                </tr>
								<tr>
                                    <td>Staff Penerima Buku</td> <td><?= $data['penerima'] ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Sidoarjo <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kepala Perpustakaan<strong></u><br>
                                        Nama
									</td>
								</tr>
							</tfoot> 
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>