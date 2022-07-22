<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Daftar Peminjaman</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="car-header bg-dark">
                <h4 class="text-white">
                    Daftar Peminjaman
                </h4>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <?php
                include "connection.php";
                $sql = "select * from
                pinjam inner join anggota
                on anggota.id_anggota=pinjam.id_anggota
                inner join petugas
                on pinjam.id_petugas=petugas.id_petugas";
                $hasil = mysqli_query($connect, $sql);
                while ($pinjam = mysqli_fetch_array($hasil)){ 
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                        <div class="col-lg-3 col-md-6">
                                <small class="text-info">Peminjam</small>
                                <h5><?=($pinjam["nama_peminjam"]?></h5>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Peminjam</small>
                                <h5><?=($pinjam["nama_anggota"]?></h5>
                            </div>
                            <div class="col-lg-3 col-md-6">
                            <small class="text-info">Petugas</small>
                            <h5><?=($pinjam["nama_petugas"]?></h5>
                            </div>
                            <div class="col-lg-3 col-md-6">
                            <small class="text-info">Tanggal Pinjam</small>
                            <h5><?=($pinjam["tgl_peminjam"]?></h5>
                            </div>
                        </div>

                        <small class ="text-success">
                            List Buku yang dipinjam
                        </small>
                        <ul>
                        <?php
                        $kode_pinjam = $pinjam["kode_pinjam"];
                        $sql = "select * from detail_pinjam
                        inner join buku
                        on detail_pinjam.isbn = buku.isbn
                        where kode pinjam '$kode_pinjam'";

                        $hasil_buku = mysqli_query($connect, $sql);
                        while ($buku = mysqli_fetch_array($hasil_buku)){
                            ?>
                            </ul>
                        <li>
                            <small><?=($buku["judul_buku"])?>
                            <i class="text-primary">
                                (Ditulis oleh <?=($buku["penulis"])?>)
                        </i>
                    </small>
                        </li>                 
                <?php
            </ul>
        </div>
    </div>
    
</body>
</html>