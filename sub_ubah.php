<?php
$row = $db->get_row("SELECT * FROM tb_sub WHERE kode_sub='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Sub</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kriteria <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_kriteria">
                    <option value=""></option>
                    <?= get_kriteria_option($row->kode_kriteria) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?= $row->kode_sub ?>" />
            </div>
            <div class="form-group">
                <label>Nama sub <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama_sub ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=sub"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>