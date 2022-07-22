<?php
session_start();
include "connection.php";
# session -> tempat penyimpanan data di sisi server
# yang dapat diakses secara global pada halaman web yang
# membutuhkan
if (isset($_POST["login"])); {
    # menampung data username dan password
    $username = $_POST["username"];
    $password = sha1($_POST["username"]);

    #ambil data petugas sesuai username & password
    $sql = "select * from petugas where
    username ='$username' and password='password'";
    $hasil = mysqli_query($connect, $sql);

    #cek hasil query
    #mysli_num_rows -> cek jumlah baris hasil query
    if (mysqli_num_rows($hasil) > 0) {
        # login berhasil
        # data disimpan ke dalam session
        $petugas = mysli_fetch_array($hasil);
        $_SESSION["petugas"] = $petugas;
        header("location:list-buku.php");
    }else{
        #login gagal
        header("location:login.php");
    }
}
?>
