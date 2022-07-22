<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Pminjaman Buku</title>
</head>
<body>
    <div class= "container">
        <div class= "card">
            <div class="card header bg-dark">
                <h4 class="text-white">
                    Form Peminjaman Buku
                </h4>
            </div>
            <div class="card-body">
                
            <!-- input kode pinjam -->
                Kode Peminjaman
                <input type="text" name="kode_pinjam"
                class="form-control mb-2" required />
                
                <!-- tgl_pinjam dibuat otomatis -->
                Tanggal Pinjam
                <input type="text" name="tgl_pinjam"
                class="form-control mb-2" readonly
                value="<?=(date("Y-m-d H:i:s"))?>">
                
                <!-- pilih anggota melalui nama -->
                Pilih Data Anggota
                <select name="id_anggota"
                class="form-control mb-2" required>
                <?php
                include "connection.php";
                $sql = "select * from anggota";
                $hasil = mysqli_query($connect, $sql);
                while ($anggota = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?($anggota["id_anggota"])?>">
                        <?=($anggota["nama_anggota"])?>
                    </option>
                    <?php
                }
                ?>
                <!-- petugas ambil dari data login -->
            </div>
        </div>
    </div>
</body>
</html>