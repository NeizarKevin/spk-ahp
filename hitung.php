<div class="page-header">
    <center><h1>Perhitungan & Perangkingan</h1></center>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <center><h3 class="panel-title">Hasil Analisa</h3></center>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Alternatif</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            $data = get_rel_alternatif();
            foreach ($data as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $SUB[$v]['nama'] ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php
function get_hasil_bobot($data)
{
    global $SUB;
    $arr = array();
    foreach ($data as $key => $val) {
        foreach ($val as $k => $v) {
            $arr[$key][$k] = $SUB[$v]['nilai_sub'];
        }
    }
    return $arr;
}
$hasil_bobot = get_hasil_bobot($data);
?>
            
<div class="panel panel-primary">
    <div class="panel-heading">
        <center><h3 class="panel-title">Hasil Pembobotan</h3></center>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <?php
                    $matriks = get_relkriteria();
                    $total = get_baris_total($matriks);
                    $normal = normalize($matriks, $total);
                    $rata = get_rata($normal);
                    foreach ($matriks as $key => $val) : ?>
                    <?php endforeach ?>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Nama Alternatif</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <?php foreach ($rata as $key => $val) : ?>
                        <th><?= round($val, 4) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            foreach ($hasil_bobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <center><h3 class="panel-title">Perangkingan</h3></center>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            function get_total($hasil_bobot, $rata)
            {
                global $SUB;
                $arr = array();

                foreach ($hasil_bobot as $key => $val) {
                    foreach ($val as $k => $v) {
                        $arr[$key] += $v * $rata[$k];
                    }
                }
                return $arr;
            }
            $total = get_total($hasil_bobot, $rata);
            FAHP_save($total);
            $rows = $db->get_results("SELECT * FROM tb_alternatif  ORDER BY total DESC");
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->rank ?></td>
                    <td><?= $row->kode_alternatif ?></td>
                    <td><?= $row->nama_alternatif ?></td>
                    <td><?= round($row->total, 5) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="panel-body">
        <?php
        $best = $rows[0]->kode_alternatif;
        ?>
        <center><p>Jadi pilihan terbaik adalah <strong><?= $ALTERNATIF[$best] ?></strong> dengan nilai <strong><?= round($total[$best], 5) ?></strong></p></center>
        <center><p><a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a></p></center>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <center><h3 class="panel-title">Grafik</h3></center>
    </div>
    <div class="panel-body">
        <style>
            .highcharts-credits {
                display: none;
            }
        </style>
        <?php
        function get_chart1()
        {
            global $db;
            $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY kode_alternatif");

            foreach ($rows as $row) {
                $data[$row->nama_alternatif] = $row->total * 1;
            }

            $chart = array();

            $chart['chart']['type'] = 'column';
            $chart['chart']['options3d'] = array(
                'enabled' => true,
                'alpha' => 15,
                'beta' => 15,
                'depth' => 50,
                'viewDistance' => 25,
            );
            $chart['title']['text'] = 'Grafik Hasil Perangkingan';
            $chart['plotOptions'] = array(
                'column' => array(
                    'depth' => 25,
                )
            );

            $chart['xAxis'] = array(
                'categories' => array_keys($data),
            );
            $chart['yAxis'] = array(
                'min' => 0,
                'title' => array('text' => 'Total'),
            );
            $chart['tooltip'] = array(
                'headerFormat' => '<span style="font-size:10px">{point.key}</span><table>',
                'pointFormat' => '<tr><td style="color:{series.color};padding:0">{series.name}: </td>
                    <td style="padding:0"><b>{point.y:.3f}</b></td></tr>',
                'footerFormat' => '</table>',
                'shared' => true,
                'useHTML' => true,
            );

            $chart['series'] = array(
                array(
                    'name' => 'Total nilai',
                    'data' => array_values($data),
                )
            );
            return $chart;
        }

        ?>
        <script>
            $(function() {
                $('#chart1').highcharts(<?= json_encode(get_chart1()) ?>);
            })
        </script>
        <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>