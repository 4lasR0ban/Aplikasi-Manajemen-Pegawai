<?php
    if( !defined( 'INDEX' ) ) die("");
?>

<div class="row mb-2 border-bottom">
    <div class="col-md">
        <h3 class="d-flex justify-content-center">Selamat Datang di Aplikasi Manajemen Pegawai</h3>
        <h5 class="d-flex justify-content-center">- <?= strtoupper( $_SESSION['level'] ) ?> -</h5>
    </div>
</div>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    Selamat Beraktifitas dan Semoga Harimu Menyenangkan <strong><?= $_SESSION['nama_pegawai'] ?>!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="card text-center">
            <div class="card-body">
                <?php
                    $pegawai = mysqli_query( $conn, "SELECT * FROM pegawai" );
                    $jml_pegawai = mysqli_num_rows( $pegawai );
                ?>
                <h5 class="card-title">Jumlah Pegawai</h5>
                <p class="card-text"><h1><strong><?= $jml_pegawai ?></strong></h1></p>
            </div>
            <div class="card-footer text-muted">
                <a href="?hal=karyawan" class="btn btn-success">More Info ></a>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card text-center">
            <div class="card-body">
                <?php
                    $golongan = mysqli_query( $conn, "SELECT * FROM golongan" );
                    $jml_golongan = mysqli_num_rows( $golongan );
                ?>
                <h5 class="card-title">Jumlah Golongan</h5>
                <p class="card-text"><h1><strong><?= $jml_golongan ?></strong></h1></p>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#golongan">More Info ></button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="golongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Kode Golongan</td>
                                <td>Nama Golongan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ( $gol= mysqli_fetch_array( $golongan ) ) {?>
                            <tr>
                                <td><?= $gol['kode_golongan'] ?></td>
                                <td><?= $gol['nama_golongan'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card text-center">
            <div class="card-body">
                <?php
                    $jabatan = mysqli_query( $conn, "SELECT * FROM jabatan" );
                    $jml_jabatan = mysqli_num_rows( $jabatan );
                ?>
                <h5 class="card-title">Jumlah Jabatan</h5>
                <p class="card-text"><h1><strong><?= $jml_jabatan ?></strong></h1></p>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#jabatan">More Info ></button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="jabatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Kode Golongan</td>
                                <td>Nama Golongan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ( $jab = mysqli_fetch_array( $jabatan ) ) {?>
                            <tr>
                                <td><?= $jab['kode_jabatan'] ?></td>
                                <td><?= $jab['nama_jabatan'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Laporan</h5>
                <p class="card-text"><h1><strong>10</strong></h1></p>
            </div>
            <div class="card-footer text-muted">
                <a href="index.php?hal=laporan" class="btn btn-success">More Info ></a>
            </div>
        </div>
    </div>

</div>
