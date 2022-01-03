<?php
    session_start();
    require_once( "config.php" );

    if ( isset( $_POST['login'] ) ){
        $mail = stripslashes( $_POST['email'] );
        $pass = stripslashes( md5( $_POST['password']  ) );
        
        $query = mysqli_query( $conn, "SELECT * FROM pegawai_view WHERE email = '$mail' AND password = '$pass' " );
        $row = mysqli_fetch_assoc( $query );
        $jml = mysqli_num_rows( $query );

        if ( $jml > 0 ){            
            $_SESSION['nip'] = $row['nip'];

            if ( isset( $_POST['rememberme'] ) ) {
                setcookie( 'nip', $row['nip'] , time() + 180 );
                setcookie( 'email', hash( 'sha256', $row['email'] ), time() + 180 );
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nama_pegawai'] = $row['nama_pegawai'];
                $_SESSION['nama_jabatan'] = $row['nama_jabatan'];
            }

            header( "Location: index.php" );
            exit;
        } else {
            echo "<script>alert( 'Email dan Password Tidak Tepat!' )</script>";
        }

    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Perhutani</title>
    <link rel="icon" href="assets/img/logo.png">
</head>

<body class="bg-light">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="assets/img/logo.png" alt="Perhutani" width="67" height="48">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="beranda.php" class="nav-link px-2 link-dark">Beranda</a></li>
                <li><a href="galeri.php" class="nav-link px-2 link-dark">Galeri</a></li>
                <li><a href="prestasi.php" class="nav-link px-2 link-dark">Prestasi</a></li>
                <li><a href="berita.php" class="nav-link px-2 link-dark">Berita</a></li>
                <li><a href="about.php" class="nav-link px-2 link-dark">Tentang Kami</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#login">Login</button>
            </div>
        </header>
    </div>

        <!-- Modal Login-->
        <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="">
                        <div class="modal-body">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control mb-3" name="email" id="email-login" placeholder="Email" required>

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control mb-3" name="password" id="pass-login" placeholder="Password" required>

                            <input type="checkbox" class="form-check-input" value="rememberme" name="rememberme" id="rememberme">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-success" name="login" value="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    