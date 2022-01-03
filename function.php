<?php
    require_once ( "config.php");
    
    function query( $query ){
        global $conn;
        $res = mysqli_query( $conn, $query );
        $rows = [];
        while( $row = mysqli_fetch_array( $res ) ){
            $rows[] = $row;
        }
        return $rows;
    }

    function update( $data ){
        global $conn;
        $nip = $data['nip'];
        $tmp_lahir = htmlspecialchars( $data['tempat_lahir'] );
        $agama = htmlspecialchars( $data['agama'] );
        $alamat = htmlspecialchars( $data['alamat'] );
        $tgl_lahir = htmlspecialchars( $data['tanggal_lahir'] );
        $telp = htmlspecialchars( $data['telepon'] );
        $fotoLama = $data['fotoLama'];

        if ( $_FILES['foto']['error'] === 4 ){
            $foto = $fotoLama;
        } else {
            $foto = upload();
            if( !$foto ){
                return false;
            }
        }

        mysqli_query( $conn, "UPDATE biodata_view SET alamat = '$alamat', telepon = '$telp', tanggal_lahir = '$tgl_lahir', tempat_lahir = '$tmp_lahir', agama = '$agama', foto = '$foto' WHERE nip = '$nip'" );

        return mysqli_affected_rows( $conn );
    }

    function upload(){
        $namaFile = $_FILES['foto']['name'];
        $sizeFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];
        
        if( $error === 4 ){
            echo "
                <script>
                    alert( 'Pilih Gambar Terlebih Dahulu!' );
                </script>
            ";
            return false;
        }

        $validEkstensi = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode( '.', $namaFile );
        $ekstensiFoto = strtolower( end( $ekstensiFoto ) );

        if ( !in_array( $ekstensiFoto, $validEkstensi ) ){
            echo "
                <script>
                    alert( 'Pastikan File Berbentuk Gambar!' );
                </script>
            ";
            return false;
        }

        if ( $sizeFile > 1000000 ){
            echo "
                <script>
                    alert( 'Ukuran Gambar Terlalu Besar' );
                </script>
            ";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFoto;

        move_uploaded_file( $tmpName, 'assets/img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function rupiah( $rupiah ){
        $final = "Rp " . number_format( $rupiah, 2, ',', '.');
        return $final;
    }

    function hapus( $nip ){
        global $conn;
        $res = mysqli_query( $conn, "DELETE FROM pegawai WHERE nip = '$nip' " );
        return mysqli_affected_rows( $conn );
    }
?>