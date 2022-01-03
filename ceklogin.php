<?php
    require_once( "config.php" );

    if ( isset( $_POST['login'] ) ){
        $mail = stripslashes( $_POST['email'] );
        $pass = stripslashes( md5( $_POST['password']  ) );
        
        $query = mysqli_query( $conn, "SELECT * FROM pegawai_view WHERE email = '$mail' AND password = '$pass' " );

        if ( mysqli_num_rows( $query ) === 1 ){
            $row = mysqli_fetch_assoc( $query );
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['nama_pegawai'] = $row['nama_pegawai'];
            $_SESSION['nama_jabatan'] = $row['nama_jabatan'];
            $_SESSION['nip'] = $row['nip'];
            $_SESSION['level'] = $row['level'];

            if( $row['level'] == "admin" ){
                $_SESSION['email'] = $mail;
                $_SESSION['password'] = $pass;
                $_SESSION['level'] = "admin";
                header( "Location: aplikasi.php" );
                exit;
            } else if ( $row['level'] == 'pegawai' ) {
                $_SESSION['email'] = $mail;
                $_SESSION['password'] = $pass;
                $_SESSION['level'] = "pegawai";
                header( "Location: aplikasi.php" );
                exit;
            } 
            
        } else {
            echo "<script>alert( 'Email dan Password tidak tepat!' );</script>";
            header( "Location: index.php" );
        }
    }
?>