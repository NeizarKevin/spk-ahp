<h1>Perhitungan</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <th>Total</th>
            <th>Rank</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_alternatif 
        WHERE kode_alternatif LIKE '%$q%' 
        OR nama_alternatif LIKE '%$q%'
        ORDER BY rank");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_alternatif ?></td>
            <td><?= $row->nama_alternatif ?></td>
            <td><?= round($row->total, 4) ?></td>
            <td><?= $row->rank ?></td>
        </tr>
    <?php endforeach ?>
</table>