<?php
    if( !defined( 'INDEX' ) ) die("");
    $pegawai = mysqli_query( $conn, "SELECT * FROM pegawai_view" );
?>

<div class="row mb-2 border-bottom">
    <div class="col-md">
        <h3 class="d-flex justify-content-center">DATA KARYAWAN</h3>
        <div class="d-flex justify-content-center">
            <a href="index.php?hal=dashboard" role="button" class="btn btn-success">dashboard</a>
        </div>
    </div>
</div>

<div class="container-fluid mt-2">
    <div class="card">
        <div class="card-body">
        <table id="table_id" class="display responsive nowrap" width="100%">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pegawai as $data){ ?>
                    <tr>
                        <td><?= $data['nip'] ?></td>
                        <td><?= $data['nama_pegawai'] ?></td>
                        <td><?= $data['nama_jabatan'] ?></td>
                        <td><?= $data['nama_golongan'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td>
                            <a href="?hal=info&id=<?= $data['nip'] ?>" role="button" class="btn btn-success info">Info</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
            details: false,
            responsive: true,
            "info" : false
        });
    } );
</script>