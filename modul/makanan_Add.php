<?php
require "includes/config.php";

if (isset($_POST['tambah'])) {
    $nama_ma = htmlspecialchars($_POST['nama_makanan']);
    $daerah_ma = htmlspecialchars($_POST['daerah_makanan']);
    $ket_ma = htmlspecialchars($_POST['Keterangan']);

    $namaGambar = $_FILES['foto_makanan']['name'];
    $ukuranGambar = $_FILES['foto_makanan']['size'];
    $error = $_FILES['foto_makanan']['error'];
    $tmpGambar = $_FILES['foto_makanan']['tmp_name'];

    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaGambar);
    $ektensiGambar = strtolower(end($ektensiGambar));
    if (!in_array($ektensiGambar, $ektensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
             window.location='?page=maAdd';
        </script>";
        return false;
    }

    if ($ukuranGambar > 1000000) {
        echo "<script>
            alert('Gambar terlalu besar!');
             window.location='?page=maAdd';
        </script>";
        return false;
    }
    move_uploaded_file($tmpGambar, 'images/makanan/' . $namaGambar);
    $gambar_ma = $namaGambar;

    $tambah_data = "INSERT INTO tbl_makanan VALUES ('','$nama_ma','$daerah_ma','$gambar_ma','$ket_ma')";

    $sql = mysqli_query($connect, $tambah_data);

    if ($sql) {
        echo "<script>window.alert('Data berhasil ditambahkan!');
                window.location='?page=makanan';</script>";
    } else {
        echo "<script>window.alert('Gagal menambahkan data!');
                window.location='?page=makanan';</script>";
    }
}
?>
<section class="makanan py-5">
    <div class="p-4">
        <div class="d-flex justify-content-center">
            <div class="row-15 w-100">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h2 class="text-center text ms-3">Tambah Daftar Makanan</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text ms-3" for="nama_makanan">Nama Makanan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" autocomplete="off" name="nama_makanan" id="nama_makanan" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text ms-3" for="daerah_makanan">Daerah Makanan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" autocomplete="off" name="daerah_makanan" id="daerah_makanan" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text ms-3" for="foto_makanan">Gambar Makanan</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="foto_makanan" id="foto_makanan" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text ms-3" for="Keterangan">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" autocomplete="off" name="Keterangan" id="Keterangan" required>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark text ms-3" type="submit" name="tambah">Tambah Data</button>
                                <a type="button" class="btn btn-outline-dark text ms-3" href="?page=makanan">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>