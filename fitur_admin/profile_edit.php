<?php
    if( !defined( 'INDEX' ) ) die("");
    $nip = $_GET['id'];
    $profil = mysqli_query( $conn, "SELECT * FROM biodata_view WHERE nip = '$nip'" );
    $prof = mysqli_fetch_array( $profil );

    if ( isset( $_POST['update'] ) ){
        if ( update( $_POST ) > 0){
            echo '
                <script>
                    alert( "Data Berhasil di Update!" );
                </script>
            ';
        } else {
            echo '
                <script>
                    alert( "Data Gagal di Update!" );
                </script>
            ';
        }
    }

?>

<div class="container-fluid mt-3">
    <div class="alert alert-warning" role="alert">
       Jika data belum berubah setelah di update, harap merefresh halaman anda! <a href="index.php?hal=profile_edit&id=<?= $nip ?>" class="alert-link">Refresh</a>.
    </div>

    <div class="card">
        <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row" id="<?= $data['nip'] ?>">
                        <div class="col-sm-4 themed-grid-col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/img/<?= $prof['foto'] ?>" class="card-img-top" alt="Foto Profil">
                                <div class="card-body">
                                <div class="input-group mb-3">
                                <input type="hidden" name="fotoLama" class="form-control" value="<?= $prof['foto'] ?>" hidden>
                                <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                                </div>
                                </div>
                            </div>
                        </div>
                    
                    
                        <div class="col-sm-4 themed-grid-col">
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control" value="<?= $prof['nip'] ?>" hidden>
                                <input type="text" class="form-control" value="<?= $prof['nip'] ?>" disabled>
                            </div>    
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="<?= $prof['nama_pegawai'] ?>" id="nama" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" name="agama" value="<?= $prof['agama'] ?>" id="agama" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $prof['alamat'] ?>" id="alamat" required></input>
                            </div>
                        </div>
                    
                    
                        <div class="col-sm-4 themed-grid-col">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $prof["tempat_lahir"] ?>" id="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $prof['tanggal_lahir'] ?>" id="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="text" class="form-control" name="telepon" value="<?= $prof['telepon'] ?>" id="telepon" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="update" class="form-label">Apakah ingin mengubah data?</label><br>
                                <button type="submit" data-role="update" name="update" data-id="<?php echo $prof['nip']; ?>" class="btn btn-success">Update</button>
                                <a href="?hal=karyawan" role="button" class="btn btn-success">Kembali</a>
                            </div>        
                        </div>
                    </div>
                </form>
        </div>  
    </div>
</div>