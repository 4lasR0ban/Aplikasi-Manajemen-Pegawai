<?php
    session_start();
    session_destroy();
    setcookie( 'nip', '', time() - 3600 );
    setcookie( 'email', '', time() - 3600 );
    header( "Location: beranda.php" );
?>