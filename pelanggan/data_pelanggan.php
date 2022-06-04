<?php

    function ambil_pelanggan($kode = NULL){
        $konek = con();
        if ($kode != NULL) {
            $cari = "WHERE kdpel = '$kode'";
        }else { $cari = ''; }
        $sql = "SELECT * FROM pelanggan $cari ORDER BY kdpel ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function input_pelanggan(){
        $konek = con();
        $kdpel = $_POST['kdpel'];
        $pel_nama = $_POST['pel_nama'];
        $pel_jk = $_POST['pel_jk'];
        $pel_alamat = $_POST['pel_alamat'];
        $pel_telp = $_POST['pel_telp'];
        $pel_kawin = $_POST['pel_kawin'];
        $pel_create = date('Y-m-d H:i:s');
        $pel_update = date('Y-m-d H:i:s');
        $sql = "INSERT INTO pelanggan (kdpel, pel_nama, pel_jk, pel_alamat, pel_telp, pel_kawin, pel_create, pel_update) 
                VALUE ('$kdpel', '$pel_nama', '$pel_jk', '$pel_alamat', '$pel_telp', '$pel_kawin', '$pel_create', '$pel_update')
                ";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else {
            echo "<script type='text/javascript'>";
            echo "alert('Data Berhasil Di input');";
            echo "</script>";
        }
    }

    function edit_pelanggan(){
        $konek = con();
        $kdpel = $_POST['kdpel'];
        $pel_nama = $_POST['pel_nama'];
        $pel_jk = $_POST['pel_jk'];
        $pel_alamat = $_POST['pel_alamat'];
        $pel_telp = $_POST['pel_telp'];
        $pel_kawin = $_POST['pel_kawin'];
        $sql = "UPDATE pelanggan SET pel_nama='$pel_nama', pel_jk='$pel_jk', pel_alamat='$pel_alamat', pel_telp='$pel_telp',
                pel_kawin='$pel_kawin' WHERE kdpel='$kdpel'";
        $result = mysqli_query($konek, $sql);
        if(!$result){ echo mysqli_error($konek); } 
        else {  
            echo '<script type="text/javascript">
                    alert("Data Berhasil Diupdate");
                  </script>';
        }
    }

    function delete_pelanggan(){
        $konek = con();
        $kdpel = $_POST['kdpel'];
        $sql = "DELETE FROM pelanggan WHERE kdpel = '$kdpel'";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{
            echo '<script type="text/javascript">
                 alert("Data Berhasil Di Delete");
                 </script>';
        }
    }

?>