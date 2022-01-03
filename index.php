<?php
    session_start();
    ob_start();
    require_once( "config.php" );
    require_once( "function.php" );


    if ( isset( $_COOKIE['nip'] ) && isset( $_COOKIE['email'] ) ) {
        $nip = $_COOKIE['nip'];
        $mail = $_COOKIE['email'];
        
        $res = mysqli_query( $conn, "SELECT * FROM pegawai_view WHERE nip = '$nip'" );
        $rows = mysqli_fetch_assoc( $res );
        $bio = mysqli_query( $conn, "SELECT foto FROM biodata WHERE nip = '$nip'" );
        $foto = mysqli_fetch_array( $bio );
        $res = mysqli_query( $conn, "SELECT * FROM pegawai_view WHERE nip = '$nip'" );
        $rows = mysqli_fetch_assoc( $res );
        if ( $rows['level'] == "admin"){
            $_SESSION['level'] = 'admin';
        } else {
            $_SESSION['level'] = 'pegawai';
        }

        if ( $mail === hash( 'sha256', $rows['email'] ) ){
            $_SESSION['login'] = true;
            $_SESSION['nama_pegawai'] = $rows['nama_pegawai'];
            $_SESSION['nama_jabatan'] = $rows['nama_jabatan'];
        }
    } else {
        $nip = $_SESSION['nip'];
        $bio = mysqli_query( $conn, "SELECT foto FROM biodata WHERE nip = '$nip'" );
        $foto = mysqli_fetch_array( $bio );
        $res = mysqli_query( $conn, "SELECT * FROM pegawai_view WHERE nip = '$nip'" );
        $rows = mysqli_fetch_assoc( $res );
        if ( $rows['level'] == "admin"){
            $_SESSION['level'] = 'admin';
        } else {
            $_SESSION['level'] = 'pegawai';
        }
    }

    if( !isset( $_SESSION['login'] ) ){
        header( "Location: beranda.php" );
        exit;
    } else {
        define( 'INDEX', true );
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Perhutani</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="icon" href="assets/img/logo.png">
</head>
 
<body class="bg-light">
    <header class="border-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png" alt="Perhutani" width="67" height="48">
                </a>
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="flex-shrink-0 dropdown mx-2">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/img/<?= $foto['foto'] ?>" alt="pic" width="80" height="80" class="rounded-circle me-2">
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                    <li><a href="?hal=profile" class="dropdown-item">Profile</a></li>
                                    <li><a href="?hal=jurnal" class="dropdown-item">Jurnal</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="nav-link" href="logout.php">Keluar</a></li>
                                </ul>
                            </div>
                            <div class="mx-2">
                                <span><?= $_SESSION['nama_pegawai'] ?></span><br>
                                <span><?= $_SESSION['nama_jabatan'] ?></span>
                            </div>
                        </div>

                        <hr>

                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="?hal=dashboard">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?hal=karyawan">Data Karyawan</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?hal=gaji">Perincian Gaji</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?hal=laporan">Laporan</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Keluar</a>
                            </li>
                        </ul>
                        <hr>
                        <form class="d-flex">
                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid">
        
        <?php 
            if( $_SESSION['level'] == 'admin'){
                include "fitur_admin.php"; 
            } else if ($_SESSION['level'] == 'pegawai'){
                include "fitur_pegawai.php"; 
            }
        ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

</body>

</html>
<?php
    }
?>