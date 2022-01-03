<?php
    if( !defined( 'INDEX' ) ) die("");
    $pegawai = mysqli_query( $conn, "SELECT * FROM pegawai INNER JOIN jabatan ON pegawai.kode_jabatan = jabatan.kode_jabatan INNER JOIN golongan ON pegawai.kode_golongan = golongan.kode_golongan WHERE nip = '$nip'" );
    $info = mysqli_fetch_array( $pegawai );
    
    if ( $info['jumlah_anak'] === 0 ){
        $tunjangan = 0;
    } else {
        $tunjangan = $info['tunjangan_anak'];
    }

    if( $info['status_nikah'] === 'Belum Menikah' ){
        $tunjangan_si = 0;      
    } else {
        $tunjangan_si = $info['tunjangan_suami_istri'];
    }

    $totpeng = $info['uang_lembur'] + $info['gaji_pokok'] + $info['tunjangan_jabatan'] + $tunjangan + $tunjangan_si;
?>

<div class="row mb-2 border-bottom">
    <div class="col-md">
        <h3 class="d-flex justify-content-center">PERINCIAN GAJI</h3>
        <h4 class="d-flex justify-content-center"><?= $_SESSION['nama_pegawai'] ?></h4>
        <h5 class="d-flex justify-content-center"><?= $nip ?></h5>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Nama Golongan</strong></td>
                            <td><?= $info['nama_golongan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tunjangan Suami/Istri</strong></td>
                            <td><?= rupiah( $tunjangan_si ) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tunjangan Anak</strong></td>
                            <td><?= rupiah( $tunjangan ) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Bonus Lembur</strong></td>
                            <td><?= rupiah( $info['uang_lembur'] ) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Asuransi Kesehatan</strong></td>
                            <td><?= rupiah( $info['askes'] ) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <div class="row">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Nama Jabatan</strong></td>
                            <td><?= $info['nama_jabatan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Gaji Pokok</strong></td>
                            <td><?= rupiah( $info['gaji_pokok'] ) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tunjangan Jabatan</strong></td>
                            <td><?= rupiah( $info['tunjangan_jabatan'] ) ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="row">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Total Penghasilan</strong></td>
                            <td><?= rupiah( $totpeng ) ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>
</div>