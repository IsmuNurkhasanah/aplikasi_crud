<?php
require "includes/config.php";

$id = $_GET['id'];

$ambil_data = "SELECT * FROM tbl_makanan WHERE id_makanan = $id";
$sql = mysqli_query($connect, $ambil_data);
$data = mysqli_fetch_assoc($sql);

if (isset($_POST['update'])) {
    $id_ma = $_POST['id_makanan'];
    $nama_ma = htmlspecialchars($_POST['nama_makanan']);
    $daerah_ma = htmlspecialchars($_POST['daerah_makanan']);
    $ket_ma = htmlspecialchars($_POST['Keterangan']);

    $gambarLama = htmlspecialchars($_POST['gambarLama']);
    if ($_FILES['foto_makanan']['error'] === 4) {
        $gambar_ma = $gambarLama;
    } else {
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
            window.location='?page=maEdit&id=$id';
        </script>";
            return false;
        }

        if ($ukuranGambar > 1000000) {
            echo "<script>
            alert('Gambar terlalu besar!');
            window.location='?page=maEdit&id=$id';
        </script>";
            return false;
        }

        $namaGambarBaru = uniqid();
        $namaGambarBaru .= '.';
        $namaGambarBaru .= $ektensiGambar;
        move_uploaded_file($tmpGambar, 'images/makanan/' . $namaGambarBaru);
        $gambar_ma = $namaGambarBaru;
    }
    $update_data = "UPDATE tbl_makanan SET 
                    nama_makanan = '$nama_ma', daerah_makanan = '$daerah_ma', 
                    foto_makanan = '$gambar_ma', Keterangan = '$ket_ma' WHERE id_makanan = $id_ma";

    $sql_update = mysqli_query($connect, $update_data);

    if ($sql_update) {
        echo "<script>window.alert('Data berhasil diUpdate!');
                window.location='?page=makanan';</script>";
    } else {
        echo "<script>window.alert('Gagal mengupdate data!');
                window.location='?page=makanan';</script>";
    }
}
?>
<section class="edit py-5">
<div class="p-4">
    <div class="d-flex justify-content-center">
        <div class="row-15 w-100">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h2 class="text-center text ms-3">Update Daftar Makanan</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_makanan" value="<?= $data['id_makanan']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $data['foto_makanan']; ?>">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="nama_makanan">Nama Makanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="nama_makanan" id="nama_makanan" value="<?= $data['nama_makanan']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="daerah_makanan">Daerah Makanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autocomplete="off" name="daerah_makanan" id="daerah_makanan" value="<?= $data['daerah_makanan']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text ms-3" for="foto_makanan">Gambar Makanan</label>
                            <div class="col-sm-9">
                                <img src="images/makanan/<?= $data['foto_makanan']; ?>" width="100"><label><?= $data['foto_makanan']; ?></label>
                                <input class="form-control" type="file" name="foto_makanan" id="foto_makanan">
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
                            <a type="button" class="btn btn-outline-dark text ms-3" href="?page=makanan">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>