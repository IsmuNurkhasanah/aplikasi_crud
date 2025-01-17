<?php
require "includes/config.php";

$id = $_GET['id'];

$ambil_data = "SELECT * FROM tbl_minuman WHERE id_minuman = $id";
$sql = mysqli_query($connect, $ambil_data);
$data = mysqli_fetch_assoc($sql);

if (isset($_POST['update'])) {
    $id_mi = $_POST['id_minuman'];
    $nama_mi = htmlspecialchars($_POST['nama_minuman']);
    $daerah_mi = htmlspecialchars($_POST['daerah_minuman']);
    $ket_mi = htmlspecialchars($_POST['Keterangan']);

    $gambarLama = htmlspecialchars($_POST['gambarLama']);
    if ($_FILES['foto_minuman']['error'] === 4) {
        $gambar_mi = $gambarLama;
    } else {
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
            window.location='?page=miEdit&id=$id';
        </script>";
            return false;
        }

        if ($ukuranGambar > 1000000) {
            echo "<script>
            alert('Gambar terlalu besar!');
            window.location='?page=miEdit&id=$id';
        </script>";
            return false;
        }

        $namaGambarBaru = uniqid();
        $namaGambarBaru .= '.';
        $namaGambarBaru .= $ektensiGambar;
        move_uploaded_file($tmpGambar, 'images/minuman/' .$namaGambarBaru);
        $gambar_mi = $namaGambarBaru;
    }
    $update_data = "UPDATE tbl_minuman SET 
                    nama_minuman = '$nama_mi', daerah_minuman = '$daerah_mi', 
                    foto_minuman = '$gambar_mi', Keterangan = '$ket_mi' WHERE id_minuman = $id_mi";

    $sql_update = mysqli_query($connect, $update_data);

    if ($sql_update) {
        echo "<script>window.alert('Data berhasil diUpdate!');
                window.location='?page=minuman';</script>";
    } else {
        echo "<script>window.alert('Gagal mengupdate data!');
                window.location='?page=minuman';</script>";
    }
}
?>
<section class="edit_minuman py-5">
<div class="p-4">
    <div class="d-flex justify-content-center">
        <div class="row-15 w-100">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h2 class="text-center text ms-3">Update Daftar Makanan</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_minuman" value="<?= $data['id_minuman']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $data['foto_minuman']; ?>">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="nama_minuman">Nama Minuman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="nama_minuman" value="<?= $data['nama_minuman']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="daerah_minuman">Daerah Minuman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="daerah_minuman" value="<?= $data['daerah_minuman']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="foto_minuman">Gambar Minuman</label>
                            <div class="col-sm-9">
                                <img src="images/minuman/<?= $data['foto_minuman']; ?>" width="100"><label><?= $data['foto_minuman']; ?></label>
                                <input class="form-control" type="file" name="foto_minuman">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="Keterangan">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="Keterangan" id="Keterangan" value="<?= $data['Keterangan']; ?>" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark text ms-3" type="submit" name="update">Update Data</button>
                            <a type="button" class="btn btn-outline-dark text ms-3" href="?page=minuman">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>