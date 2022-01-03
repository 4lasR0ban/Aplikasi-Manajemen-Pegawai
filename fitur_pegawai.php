<?php
    if( !defined( 'INDEX' ) ) die("");

    $halaman = array( "dashboard", "profile", "karyawan", "gaji", "laporan", "info", "jurnal");

    if( isset( $_GET['hal'] ) ) $hal = $_GET['hal'];
    else $hal = "dashboard";

    foreach( $halaman as $h ){
        if( $hal == $h ){
            include "fitur_pegawai/$h.php";
            break;
        }
    }
?>