<?php
    if ( isset( $_GET['name'] ) ){
        $filename = $_GET['name'];

        $file = "assets/file/".$filename;

        if ( file_exists( $file ) ){
            header( 'Content-Description: File Transfer' );
            header( 'Content-Type: application/octet-stream' );
            header( 'Content-Disposition: attachment; filename='.basename( $file ) );
            header( 'Content-Transfer-Encoding: binary');
            header( 'Expires: 0' );
            header( 'Cache-Control: private' );
            header( 'Cache-Control: private' );
            header( 'Pragma: private' );
            header( 'Content-Length: '.filesize( $file ) );
            ob_clean();
            flush();
            readfile( $file );

            exit;
        } else {
            $_SESSION['pasan'] = "File Tidak Ditemukan!";
            header( "Location: index.php?hal=laporan" );
        }
    }
?>