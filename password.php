<div class="page-header">
    <h1>Ubah Password</h1>
</div>
<div class="row">
    <div class="col-sm-5">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Password Lama <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass1" />
            </div>
            <div class="form-group">
                <label>Password Baru <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass2" />
            </div>
            <div class="form-group">
                <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass3" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>