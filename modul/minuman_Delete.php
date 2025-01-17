<?php
require "includes/config.php";
    $id = $_GET['id'];
    $hapus = "DELETE FROM tbl_minuman WHERE id_minuman = $id";
    $sql = mysqli_query($connect, $hapus); 

    if ($sql) {
        echo "<script>window.alert('Data berhasil dihapus!');
                window.location='?page=minuman';</script>";
    } else {
        echo "<script>window.alert('Gagal menghapus data!');
                window.location='?page=minuman';</script>";
    }
?>  