<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Nilai Bobot &raquo; <small><?= $row->nama_alternatif ?></small></h1>
</div>
<div class="row">
    <div class="col-sm-4">
        <form method="post" action="aksi.php?act=rel_alternatif_ubah">
            <?php
            $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub
                FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
                WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
            foreach ($rows as $row) : ?>
                <div class="form-group">
                    <label><?= $row->nama_kriteria ?></label>
                    <select class="form-control" name="nilai[<?= $row->ID ?>]">
                        <?= get_sub_option($row->kode_sub, $row->kode_kriteria) ?>
                    </select>
                </div>
            <?php endforeach ?>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>