<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Buku Pertahun</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $ambilthn=$_POST['tahun'];

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Manajemen Perpustakaan SMP AL ISLAM TAMAN</h2>
                        <h4>Jl Ketegan Barat II gang Baik RT. 03 RW. 01 <br> Kabupaten Sidoarjo, Kecamatan Taman, 61257</h4>
                        <hr>
                        <h3>DATA BUKU TAHUN <? echo "$ambilthn"; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                        <tbody>
                <thead>
								<tr>
									<th>No.</th><th width="17%"><center>Judul Buku</th><th><center>Nama Pengarang</th><th><center>Penerbit</th><th><center>Tahun Terbit</th><th width="10%"><center>Loker Buku</th><th width="14%"><center>Nomor <br> (Rak-Laci-Boks)</center></th><th><center>Penerima Buku</th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM buku WHERE substr(tahun_terbit,1,4)='$ambilthn'";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
                                    <td><?= $data['nama_pengarang'] ?></td>
                                    <td><?= $data['penerbit'] ?></td>
                                    <td><?= $data['tahun_terbit'] ?></td>
                                    <td><?= $data['loker_buku'] ?></td>
                                    <td><?= $data['kode_buku'] ?> - <?= $data['jumlah_buku'] ?></td>
                                    <td><?= $data['penerima'] ?></td>
                                    <td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="8" class="text-right">
                                        Sidoarjo,  &nbsp <?= date("d-m-Y") ?>
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
