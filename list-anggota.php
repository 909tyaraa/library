<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Perpustakaan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Data Anggota Perpustakaan</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <a href="form-anggota.php">
                        <button class="btn btn-outline-success btn-block">
                            Daftar Menjadi Anggota
                        </button>
                    </a>
                </div>
                <hr>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    $sql = "select * from anggota";
                    
                    //eksekusi perintah sql
                    $query = mysqli_query($connect, $sql);
                    while($anggota = mysqli_fetch_array($query)){ ?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data anggota-->
                            <div class="col-lg-10 col-md-10">
                                <h5>Nama Anggota : <?php echo $anggota["nama_anggota"];?></h5>
                                <h6>ID Anggota : <?php echo $anggota["id_anggota"];?></h6>
                                <h6>Tanggal Lahir : <?php echo $anggota["tanggal_lahir"];?></h6>
                                <h6>Alamat : <?php echo $anggota["alamat"];?></h6>
                                <h6>Telepon : <?php echo $anggota["telepon"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan-->
                            <div class="col-lg-2 col-md-2">
                                <a href="form-anggota.php?id_anggota=<?=$anggota["id_anggota"]?>">
                                <button class="btn btn-block btn-outline-primary">
                                    Edit
                                </button></a>
                                <a href="delete.php?id_anggota=<?=$anggota["id_anggota"]?>">
                                <button class="btn btn-block btn-danger"
                                onclick="return confirm('Apakah anda yakin?')">
                                    Remove
                                </button></a>
                            </div>
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
</body>
</html>