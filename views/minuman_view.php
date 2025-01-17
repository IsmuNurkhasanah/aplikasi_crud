<?php
require "includes/config.php";
$ambilData = "SELECT * FROM tbl_minuman ORDER BY id_minuman ASC";
$sql = mysqli_query($connect, $ambilData);
?>
<section class="home py-5">
    <form class="d-flex" method="post" action="">
        <div class="d-grid gap-2 d-md-block pb-2">
            <a type="button" class="btn btn-outline-dark" href="?page=miAdd">Tambah Data [+]</a>
        </div>
    </form>
    <table class="table align-middle table-striped" id="example">
        <thead>
            <tr>
                <th class="col-1">No.</th>
                <th class="col-2">Gambar Minuman</th>
                <th class="col-2">Nama Minuman</th>
                <th class="col-2">Asal Daerah</th>
                <th class="col-2">Keterangan</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $ambilData = "SELECT * FROM tbl_minuman ORDER BY id_minuman ASC";
            $sql = mysqli_query($connect, $ambilData);

            $no = 1;
            foreach ($sql as $value) {
            ?>
                <tr>
                    <th class="text-center"><?= $no++; ?></th>
                    <td><img src="images/minuman/<?= $value['foto_minuman']; ?>" width="100" class="rounded d-block"></td>
                    <td><?= $value['nama_minuman']; ?></td>
                    <td><?= $value['daerah_minuman']; ?></td>
                    <td><?= $value['Keterangan']; ?></td>
                    <td class="p-2">
                        <a href="?page=miEdit&id=<?= $value['id_minuman']; ?>" class="btn btn-sm btn-warning">Update</a>
                        <a href="?page=miDel&id=<?= $value['id_minuman']; ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
        <tfoot>
            <tr>
                <th class="col-1">No.</th>
                <th class="col-2">Gambar Minuman</th>
                <th class="col-2">Nama Minuman</th>
                <th class="col-2">Asal Daerah</th>
                <th class="col-2">Keterangan</th>
                <th class="col-2">Aksi</th>
            </tr>
        </tfoot>
    </table>
</section>