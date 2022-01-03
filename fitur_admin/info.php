<?php
    if( !defined( 'INDEX' ) ) die("");
    $nip = $_GET['id'];
    $infos = mysqli_query( $conn, "SELECT * FROM biodata_view WHERE nip = '$nip'");
    $info = mysqli_fetch_array( $infos );
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-body">
                <form method="POST" action="update.php">
                    <div class="row">
                        <div class="col-sm-3 themed-grid-col">
                            <img src="assets/img/<?= $info['foto'] ?>" width="278" height="278" class="rounded-circle" alt="Foto Profil">
                        </div>
                    
                    
                        <div class="col-sm-4 themed-grid-col">
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control" value="<?= $info['nip'] ?>" disabled>
                            </div>    
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="<?= $info['nama_pegawai'] ?>" id="nama" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" name="agama" value="<?= $info['agama'] ?>" id="agama" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="text" class="form-control" name="telepon" value="<?= $info['telepon'] ?>" id="telepon" disabled>
                                </div>
                            </div>
                        </div>
                    
                    
                        <div class="col-sm-5 themed-grid-col">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $info["tempat_lahir"] ?>" id="tempat_lahir" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $info['tanggal_lahir'] ?>" id="tanggal_lahir" disabled>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" disabled><?= $info['alamat'] ?></textarea>
                            </div>    
                            <div>
                                <a href="?hal=karyawan" role="button" class="btn btn-success">Kembali</a>
                            </div>   
                        </div>
                    </div>
                </form>
        </div>  
    </div>
</div>
