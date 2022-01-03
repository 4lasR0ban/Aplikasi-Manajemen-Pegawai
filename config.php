<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'amp';

    $conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );

    if( !$conn ){
        die( "Koneksi Gagal: " . mysqli_connecr_error());
    }

?>