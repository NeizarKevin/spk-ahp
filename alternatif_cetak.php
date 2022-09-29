<h1>Alternatif</h1>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama Alternatif</th>
		</tr>
	</thead>
	<?php
	$q = esc_field($_GET['q']);
	$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
	$no = 0;
	foreach ($rows as $row) : ?>
		<tr>
			<td><?= ++$no ?></td>
			<td><?= $row->kode_alternatif ?></td>
			<td><?= $row->nama_alternatif ?></td>
		</tr>
	<?php endforeach ?>
</table>