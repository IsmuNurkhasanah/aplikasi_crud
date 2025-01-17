<?php
require "includes/config.php";

if (isset($_POST['tambah'])) {
    $nama_mi = htmlspecialchars($_POST['nama_minuman']);
    $daerah_mi = htmlspecialchars($_POST['daerah_minuman']);
    $ket_mi = htmlspecialchars($_POST['Keterangan']);

    $namaGambar = $_FILES['foto_minuman']['name'];
    $ukuranGambar = $_FILES['foto_minuman']['size'];
    $error = $_FILES['foto_minuman']['error'];
    $tmpGambar = $_FILES['foto_minuman']['tmp_name'];

    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaGambar);
    $ektensiGambar = strtolower(end($ektensiGambar));
    if (!in_array($ektensiGambar, $ektensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
            window.location='?page=miAdd';
        </script>";
        return false;
    }

    if ($ukuranGambar > 1000000) {
        echo "<script>
            alert('Gambar terlalu besar!');
            window.location='?page=miAdd';
        </script>";
        return false;
    }

    move_uploaded_file($tmpGambar, 'images/minuman/' . $namaGambar);
    $gambar_mi = $namaGambar;

    $tambah_data = "INSERT INTO tbl_minuman VALUES ('','$nama_mi','$daerah_mi','$gambar_mi','$ket_mi')";

    $sql = mysqli_query($connect, $tambah_data);

    if ($sql) {
        echo "<script>window.alert('Data berhasil ditambahkan!');
                window.location='?page=minuman';</script>";
    } else {
        echo "<script>window.alert('Gagal menambahkan data!');
                window.location='?page=minuman';</script>";
    }
}
?>
<section class="minuman py-5">
<div class="p-4">
    <div class="d-flex justify-content-center">
        <div class="row-15 w-100">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h2 class="text-center text ms-3">Tambah Daftar Minuman</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="nama_minuman">Nama Minuman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="nama_minuman" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="daerah_minuman">Daerah Minuman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="daerah_minuman" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="foto_minuman">Gambar Minuman</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="foto_minuman" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="Keterangan">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"autocomplete="off"  name="Keterangan" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark text ms-3" type="submit" name="tambah">Tambah Data</button>
                            <a type="button" class="btn btn-outline-dark text ms-3" href="?page=minuman">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>