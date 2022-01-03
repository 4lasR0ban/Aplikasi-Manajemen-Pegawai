<?php
    if( !defined( 'INDEX' ) ) die("");
    $nip = $_SESSION['nip'];
?>


<div class="container-fluid mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rekap Absen</h5>
                    <hr>
                    <div id="grafik">
                        <?php
                            $rekap = mysqli_query( $conn, "SELECT * FROM absen" );
                            while ( $row = mysqli_fetch_array( $rekap ) ){
                                $data1[] = array(
                                    $row['bulan'],
                                    floatval( $row['masuk'] ),
                                    $row['nip']
                                );
                                $data2[] = array(
                                    $row['bulan'],
                                    floatval( $row['izin'] )
                                );
                                $data3[] = array(
                                    $row['bulan'],
                                    floatval( $row['sakit'] )
                                );
                                $data4[] = array(
                                    $row['bulan'],
                                    floatval( $row['alpha'] )
                                );
                            }
                            $json1 = json_encode( $data1 );
                            $json2 = json_encode( $data2 );
                            $json3 = json_encode( $data3 );
                            $json4 = json_encode( $data4 );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
        Highcharts.chart('grafik', {
            colors: ['#d35d6e', '#efb08c', '#f8d49d', '#5aa469'],
            chart: {
                type: 'column',
                zoomType: 'x'
            },
            title: {
                text: 'Rekap Absen'
            },
            subtitle: {
                text: 'Periode Oktober - Desember'
            },
            yAxis: {
                title: {
                    text: 'Hari'
                }
            },
            xAxis: {
                type: 'category', 
                accessibility: {
                    rangeDescription: 'bulan'
                }
            },
            tooltip: {
                pointFormat: '{point.y} Hari'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false,
                    }
                }
            },
            series: [{
                name: 'Masuk',
                data: <?= $json1 ?>
            }, {
                name: 'izin',
                data: <?= $json2 ?>
            }, {
                name: 'sakit',
                data: <?= $json3 ?>
            }, {
                name: 'Alpha',
                data: <?= $json4 ?>
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

        document.getElementById('small').addEventListener('click', function () {
            chart.setSize(400);
        });

        document.getElementById('large').addEventListener('click', function () {
            chart.setSize(600);
        });

        document.getElementById('auto').addEventListener('click', function () {
            chart.setSize(null);
        });
    </script>