<?php
    require "function.php";
    $nip = $_GET["id"];
        if( hapus( $nip ) > 0){
            echo "
                <script>
                    alert('Data Berhasil Dihapus!');
                    window.location.href= 'index.php?hal=karyawan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Dihapus!');
                    window.location.href= 'index.php?hal=karyawan';
                </script>
            ";
        }
    
?>