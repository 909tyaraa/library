<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Petugas Perpustakaan </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- card header -->
            <div class="card-header bg-info">
                <h4 class="text-white">Data Petugas Perpustakaan</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- kotak pencarian data anggota -->
                <form action="list-petugas.php" method="get"> --> pencarian
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" required />
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat loadd halaman ini,
                        # akan mengecek apakah data dengan method
                        # GET yg bernama "search"
                        $search = $_GET ["search"];
                        $sql = "select * from petugas
                        where nama_petugas like '%$search%'
                        or kontak like '%$search%' 
                        or username like '%$search%'
                        or password like '%$search%'";
                    } else {
                        $sql = "select * from petugas";
                    }
                    
                    //eksekusi perintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    while ($petugas = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data anggota -->
                            <div class="col-lg-8 col-md-10">
                                <h4>Nama Petugas: <?php echo $petugas["nama_petugas"];?></h4>
                                <h6>Kontak: <?php echo $petugas["kontak"];?></h6>
                                <h6>ID Petugas: <?php echo $petugas["id_petugas"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan -->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-petugas.php?id_petugas=<?php echo $petugas["id_petugas"];?>">
                                <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                            </a>
                                <div class="card-footer">
                                    <a href="process-petugas.php?id_petugas=<?=$petugas["id_petugas"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <button class="btn btn-block btn-danger">
                                    Remove
                                </button>
                                </a>
                            </div>
                            <!-- button tambah data --.
                            <a href="form-petugas.php">
                                <button class="btn btn-succes">
                                    Tambah Data Petugas
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-petugas.php"> 
                    <button class="btn btn-success">
                        Tambah Data Petugas
                    </button>
                </a>
            </div>
            < !-- card footer -->
        </div>
    </div>
</body>
</html>