<?php
    if( !defined( 'INDEX' ) ) die("");

    $halaman = array( "dashboard", "profile", "profile_edit", "karyawan", "gaji", "riwayat", "laporan", "info", "jurnal", "jabatan");

    if( isset( $_GET['hal'] ) ) $hal = $_GET['hal'];
    else $hal = "dashboard";

    foreach( $halaman as $h ){
        if( $hal == $h ){
            include "fitur_admin/$h.php";
            break;
        }
    }
?>