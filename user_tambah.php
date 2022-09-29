<div class="page-header">
    <h1>Tambah user</h1>
</div>
<form method="post">
    <div class="row">
        <div class="col-sm-6">
            <?php if ($_POST) include 'aksi.php' ?>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_user" value="<?= set_value('kode_user', kode_oto('kode_user', 'tb_user', 'U', 3)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_user" value="<?= set_value('nama_user') ?>" />
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?= set_value('user') ?>" />
            </div>
            <div class="form-group">
                <label>Pass <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?= set_value('pass') ?>" />
            </div>
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label>
                <select class="form-control" name="level">
                    <?= get_level_option('level') ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=user"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</form>