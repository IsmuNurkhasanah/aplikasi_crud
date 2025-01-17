<?php
require "includes/config.php";
    $id = $_GET['id'];
    $hapus = "DELETE FROM tbl_makanan WHERE id_makanan = $id";
    $sql = mysqli_query($connect, $hapus); 

    if ($sql) {
        echo "<script>window.alert('Data berhasil dihapus!');
                window.location='?page=makanan';</script>";
    } else {
        echo "<script>window.alert('Gagal menghapus data!');
                window.location='?page=makanan';</script>";
    }
?>  