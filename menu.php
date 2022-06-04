<ul>
    <li><a href="index.php">HOME</a></li>
    <li><a href="index.php?page=master_barang">Master Barang</a></li>
    <li><a href="index.php?page=master_pelanggan">Master Pelanggan</a></li>
    <li><a href="index.php?page=add_transaksi">Transaksi</a></li>
    <li><a href="index.php?page=master_transaksi">Laporan</a></li>
    <li><a href="index.php?page=summary">Summary</a></li>
    <li>
        <script>
            function konfirmasi() {
                var tanya = confirm('Yakin Ingin Keluar');
                if (tanya == true) {
                    alert('berhasil keluar');
                    return true;
                }else{
                    return false;
                }
            }
        </script>
        <a href="logout.php" onClick="return konfirmasi()">Logout</a>
    </li>
</ul>