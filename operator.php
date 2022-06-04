<?php
    if(isset($_POST['operator'])){
        //barang
        if($_POST['operator'] == "add_barang"){ input_barang(); }
        if ($_POST['operator'] == "edit_barang") { edit_barang(); }
        if($_POST['operator'] == "delete_barang"){ delete_barang(); }
        //pelanggan
        if ($_POST['operator'] == "add_pelanggan") { input_pelanggan(); }
        if ($_POST['operator'] == "edit_pelanggan") { edit_pelanggan(); }
        if ($_POST['operator'] == "delete_pelanggan") { delete_pelanggan(); }
        //transaksi
        if ($_POST['operator'] == "add_sementara") { input_sementara(); }
        if ($_POST['operator'] == "add_transaksi") { input_transaksi(); }
        if ($_POST['operator'] == "delete_sementara") { delete_sementara_transaksi(); }
    }
?>