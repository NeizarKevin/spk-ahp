<div class="page-header">
    <h1>Nilai Bobot Sub Kriteria</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_sub" />
            <div class="form-group">
                <select class="form-control" name="kode_kriteria" onchange="this.form.submit()">
                    <option value="">Pilih kriteria</option>
                    <?= get_kriteria_option($_GET['kode_kriteria']) ?>
                </select>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <?php
        if ($_POST) include 'aksi.php';
        $rows = $db->get_results("SELECT r.ID1, r.ID2, nilai 
            FROM tb_rel_sub r 
            INNER JOIN tb_sub s1 ON s1.kode_sub=r.ID1
            INNER JOIN tb_sub s2 ON s2.kode_sub=r.ID2
            WHERE s1.kode_kriteria='$_GET[kode_kriteria]' AND s2.kode_kriteria='$_GET[kode_kriteria]'     
            ORDER BY ID1, ID2");
        $criterias = array();
        $matriks = array();
        foreach ($rows as $row) {
            $matriks[$row->ID1][$row->ID2] = $row->nilai;
        }
        $total = get_baris_total($matriks);
        $normal = normalize($matriks, $total);
        $rata = get_rata($normal);
        $mmult = mmult($matriks, $rata);
        foreach ($rata as $key => $val) {
            $db->query("UPDATE tb_sub SET nilai_sub='$val' WHERE kode_sub='$key'");
        }
        $cm = consistency_measure($matriks, $rata);
        ?>
        <form class="form-inline" action="?m=rel_sub&kode_kriteria=<?= $_GET['kode_kriteria'] ?>" method="post">
            <div class="form-group">
                <select class="form-control" name="ID1">
                    <?= get_sub_option($_POST['ID1'], $_GET['kode_kriteria']) ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="nilai">
                    <?= get_nilai_option($_POST['nilai']) ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="ID2">
                    <?= get_sub_option($_POST['ID2'], $_GET['kode_kriteria']) ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </div>
        </form>
    </div>
<div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Matriks Perbandingan SubKriteria</h3>
        </div>
    <?php if ($matriks) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <?php foreach ($matriks as $key => $val) : ?>
                            <th><?= $key ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($matriks as $key => $val) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $SUB[$key]['nama'] ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td><?= round($v, 3) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
                <tfoot>
                    <td>&nbsp;</td>
                    <td>Total</td>
                    <?php foreach ($total as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Normalisasi</h3>
            </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($matriks as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                    <th>Prioritas</th>
                </tr>
            </thead>
            <?php foreach ($normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                    <td><?= round($rata[$key], 4) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Matriks Bobot Prioritas SubKriteria</h3>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php
                    $normal = normalize($matriks, $total);
                    $rata = get_rata($normal);
                    $cm = consistency_measure($matriks, $rata);
                    foreach ($matriks as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                    <th>Prioritas</th>
                    <th>CM (Total/Prioritas)</th>
                </tr>
            </thead>
                    <?php foreach ($normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                    <td><?= round($rata[$key], 4)?></td>
                    <td><?= round($cm[$key], 3) ?></td>
                </tr>
                    <?php endforeach ?>
        </table>
    </div>

    <div class="panel-body">
                Berikut tabel ratio index berdasarkan ordo matriks.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Ordo matriks</th>
                        <?php
                        foreach ($nRI as $key => $value) {
                            if (count($matriks) == $key)
                                echo "<td class='text-primary'>$key</td>";
                            else
                                echo "<td>$key</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>Ratio index</th>
                        <?php
                        foreach ($nRI as $key => $value) {
                            if (count($matriks) == $key)
                                echo "<td class='text-primary'>$value</td>";
                            else
                                echo "<td>$value</td>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
        <div class="panel-body">
            <?php
            $CI = ((array_sum($cm) / count($cm)) - count($cm)) / (count($cm) - 1);
            $RI = $nRI[count($matriks)];
            $CR = $RI == 0 ? 0 : $CI / $RI;
            echo "<p>Consistency Index: " . round($CI, 3) . "<br />";
            echo "Ratio Index: " . round($RI, 3) . "<br />";
            echo "Consistency Ratio: " . round($CR, 3);
            if ($CR > 0.10) {
                echo " (Tidak konsisten)<br />";
            } else {
                echo " (Konsisten)<br />";
            }
            ?>
        </div>
        <?php endif ?>
        </div>
    </div>
</div>