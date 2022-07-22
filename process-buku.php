<?php
include "connection.php";
if (isset($_POST["simpan_buku"])) {
    #menampung data yang dikirim ke dalam variable
    $isbn = $_POST["isbn"];
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $genre = $_POST["genre"];
    $jumlah_halaman = $_POST["jumlah_halaman"];

    # manage uplod file
    $fileName = $_FILES["cover"]["name"]; // file name
    $extension = pathinfo($_FILES["cover"]["name"]);
    $ext = $extension["extension"]; // ekstensi file

    $cover = time()."-".$fileName;

    # proses upload
    $folderName = "cover/$cover";
    if (move_uploaded_file($_FILES["cover"]["tmp_name"],$folderName)) {
        # proses insert data ke tabel buku
        $sql = "insert into buku values
        ('$isbn','$judul_buku','$penulis','$penerbit'
        '$jumlah_halaman','$genre','$cover')";

        # eksekusi perintah SQL
        mysqli_query($connect, $sql);

        echo "Tambah data buku berhasil!";
    }
    else{
        echo "Upload file gagal";
    }
}
?>