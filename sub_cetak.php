<h1>Sub Kriteria</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kriteria</th>
            <th>Kode</th>
            <th>Nama sub</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_sub s
        INNER JOIN tb_kriteria k ON s.kode_kriteria=k.kode_kriteria 
        WHERE nama_sub LIKE '%$q%' ORDER BY k.kode_kriteria, s.kode_sub");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nama_kriteria ?></td>
            <td><?= $row->kode_sub ?></td>
            <td><?= $row->nama_sub ?></td>
        </tr>
    <?php endforeach ?>
</table>