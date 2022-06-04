<?php
    if(isset($_GET['page'])){
        //master barang
        if($_GET['page'] == "master_barang"){ require("barang/view_barang.php"); }
        elseif ($_GET['page'] == "add_barang") { require ("barang/add_barang.php"); }
        elseif ($_GET['page'] == "edit_barang") { require ("barang/edit_barang.php"); }
        elseif ($_GET['page'] == "delete_barang") { require ("barang/delete_barang.php"); }
        //master Pelanggan
        elseif ($_GET['page'] == "master_pelanggan"){ require ("pelanggan/view_pelanggan.php"); }
        elseif ($_GET['page'] == "add_pelanggan"){ require ("pelanggan/add_pelanggan.php"); }
        elseif ($_GET['page'] == "edit_pelanggan") { require ("pelanggan/edit_pelanggan.php"); }
        elseif ($_GET['page'] == "delete_pelanggan") { require ("pelanggan/delete_pelanggan.php"); }
        //master Transaksi
        elseif ($_GET['page'] == "master_transaksi"){ require ("transaksi/view_transaksi.php");}
        elseif ($_GET['page'] == "add_transaksi"){ require ("transaksi/add_transaksi.php");}
        elseif ($_GET['page'] == "detail_transaksi"){ require ("transaksi/view_transaksi_detail.php"); }
        elseif ($_GET['page'] == "delete_sementara"){ require ("transaksi/delete_sementara.php"); }
        elseif ($_GET['page'] == "summary"){ require ("transaksi/view_summary.php"); }
        //error link
        else{ require ("home.php"); }
    }else{
        require ("home.php");
    }
?>