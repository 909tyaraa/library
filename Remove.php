<?php
include ("connection.php");

$id = $_GET["id_anggota"];

// membuat perintah sql utk menghapus
$sql = "
delete from anggota 
where id_anggota = '".$id_anggota."';
";

// eksekusi perintah sql
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location: list-anggota.php");
} else{
    echo("Gagall".mysqli_error($connect));
    exit();
}

?>