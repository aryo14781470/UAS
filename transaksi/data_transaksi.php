<?php
    function ambil_transaksi($kode = NULL, $field = NULL){
        $konek = con();
        if ($kode != NULL) {
            $cari = "WHERE $field LIKE '%$kode%'";
        }else{ $cari = ''; }
        $sql = "SELECT * FROM transaksi A INNER JOIN pelanggan B ON A.kdpel=B.kdpel $cari ORDER BY idtrans DESC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function ambil_idtrans($tgl){
        $konek = con();
        $sql = "SELECT idtrans FROM transaksi WHERE idtrans LIKE '%$tgl%' ORDER BY idtrans DESC LIMIT 1";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else {
            return $result;
        }
    }

    function ambil_detail_transaksi($kode = NULL){
        $konek = con();
        if ($kode != NULL) { $cari = "WHERE idtrans = '$kode'"; } else { $cari = ""; }
        $sql = "SELECT * FROM detail A INNER JOIN barang B ON A.kdbrg=B.kdbrg $cari ORDER BY brg_nama ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) { echo mysqli_error($konek); } else { return $result; }
    }

    function ambil_sementara($kdbrg = NULL){
        $konek = con();
        if ($kdbrg != NULL) {
            $cari = "WHERE A.kdbrg = '$kdbrg'";
        }else {
            $cari = "";
        }
        $sql = "SELECT * FROM sementara A INNER JOIN barang B ON A.kdbrg=B.kdbrg $cari ORDER BY B.brg_nama ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else {
            return $result;
        }
    }

    function input_sementara(){
        $konek = con();
        $idtrans = $_POST['idtrans'];
        $kdbrg = $_POST['kdbrg'];
        $detail_qty = $_POST['detail_qty'];
        $detail_harga = cek_harga($kdbrg);
        $sementara = ambil_sementara($_POST['kdbrg']);
        $jumlah = mysqli_num_rows($sementara);
        $stok_skrg = mysqli_query($konek, "SELECT * FROM barang WHERE kdbrg = '$kdbrg'");
        $stok = mysqli_fetch_array($stok_skrg);
        $row1 = $stok['brg_stok'];
        if ($detail_qty > $row1) {
            echo '<script type="text/javascript">';
            echo 'alert("kebanyakan lu Belinya");';
            echo '</script>';
            return false;
        }
        if ($jumlah <> 0) {
            while ($row = mysqli_fetch_array($sementara)) {
                $tambah = $row['detail_qty'];
            }
            $detail_qty2 = $detail_qty + $tambah;
            $sql = "UPDATE sementara SET detail_qty = '$detail_qty2' WHERE kdbrg = '$kdbrg'";
        }else {
            $sql = "INSERT INTO sementara (idtrans, kdbrg, detail_qty, detail_harga)
                    VALUE ('$idtrans', '$kdbrg', '$detail_qty', '$detail_harga')";
        }
        $result = mysqli_query($konek, $sql);
        if (!$result) { echo mysqli_error($konek); }
    }

    function delete_sementara(){
        $konek = con();
        $sql = "DELETE FROM sementara";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }
    }

    function delete_sementara_transaksi(){
        $konek = con();
        $kdbrg2 = $_POST['kdbrg2'];
        //$kdpel = $_GET['kdpel'];
        $sql = "DELETE FROM sementara WHERE kdbrg='$kdbrg2'";
        $result = mysqli_query($konek, $sql);
        if (!$result) { echo mysqli_error($konek); }  
        echo '<script type="text/javascript">';
		echo 'alert("cart berhasil di hapus");';
		echo '</script>';
    }

    function input_transaksi(){
        $konek = con();
        $idtrans = $_POST['idtrans'];
        $trans_tgl = date('Y-m-d');
        $kdpel = $_POST['kdpel'];
        $trans_create = date('Y-m-d H:i:s');
        $trans_update = date('Y-m-d H:i:s');
        $sql = "INSERT INTO transaksi (idtrans, trans_tgl, kdpel, trans_create, trans_update, kasir)
                VALUE ('$idtrans', '$trans_tgl', '$kdpel', '$trans_create', '$trans_update', '')";
        $result = mysqli_query($konek, $sql);
        if (!$result) { echo mysqli_error($konek); }
        $sementara = ambil_sementara();
        while ($row = mysqli_fetch_array($sementara)) {
            $idtrans = $row['idtrans'];
            $kdbrg = $row['kdbrg'];
            $detail_qty = $row['detail_qty'];
            $detail_harga = $row['detail_harga'];
			$detail_create = date('Y-m-d H:i:s');
			$detail_update = date('Y-m-d H:i:s');
			$sql = "INSERT INTO detail (idtrans, kdbrg, detail_qty, detail_harga, detail_create, detail_update) 
			        VALUES ('$idtrans','$kdbrg','$detail_qty','$detail_harga','$detail_create','$detail_update')";	
			$result = mysqli_query($konek,$sql);
			if (!$result) { echo mysqli_error($konek); } 
			//Update Stok Barang
			$barang = ambil_barang($kdbrg);
			while ($rw = mysqli_fetch_array($barang))
			{
				$stokbaru = $rw['brg_stok'] - $detail_qty;
				$sql = "UPDATE barang set brg_stok='$stokbaru' WHERE kdbrg='$kdbrg'";	
				$result = mysqli_query($konek,$sql);
				if (!$result) { echo mysql_error(); }					
			}				
        }
        delete_sementara();
        echo '<script type="text/javascript">';
		echo 'alert("Data Berhasil Di Input");';
		echo 'window.location.assign("http://localhost/Web_Technology_S6/UAS/index.php?page=add_transaksi")';
		echo '</script>';
    }
?>