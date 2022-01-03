<?php
    if( !defined( 'INDEX' ) ) die("");
    $files = mysqli_query( $conn, "SELECT * FROM file" );
    
?>

<div class="container-fluid mt-3 mb-3">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1>Laporan</h1>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <?php while( $file = mysqli_fetch_array( $files ) ) { ?>
                                <tr>
                                    <td><strong>Laporan <?= $file['nama_file'] ?></strong></td>
                                    <td><a href="download.php?name=<?= $file['nama_file']?>">Download</a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

