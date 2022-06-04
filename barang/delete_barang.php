<script type="text/javascript">
    function konfirmasi(){
        var tanya = confirm("Mau Hapus Data Lu, Yakin?");
        if(tanya == true){
            return true;
        }else{
            return false;
        }
    }
</script>
<?php
    $data = ambil_barang($_GET['kdbrg']);
    while($row = mysqli_fetch_array($data)){
        $kdbrg = $row['kdbrg'];
        $brg_nama = $row['brg_nama'];
        $brg_harga = $row['brg_harga'];
        $brg_stok = $row['brg_stok'];
        $brg_kategori = $row['brg_kategori'];
        $brg_garansi = $row['brg_garansi'];
    }
    $no_bar = mysqli_query($konek, "SELECT * FROM detail WHERE kdbrg = '$kdbrg'");
    $no_bar1 = mysqli_fetch_array($no_bar);
    $row1 = $no_bar1['kdbrg'];
?>
<h2>
    Delete Barang &nbsp;
    (<a href="index.php?page=master_barang">View Barang</a>)
</h2>
<table>
    <form action="index.php?page=master_barang" method="post" onSubmit="return konfirmasi()">
        <tr>
            <td>Kode</td>
            <td><?php echo $kdbrg ?></td>
        </tr>
        <tr>
            <td>Barang Nama</td>
            <td><?php echo $brg_nama ?></td>
        </tr>
        <tr>
            <td>Barang Harga</td>
            <td><?php echo $brg_harga ?></td>
        </tr>
        <tr>
            <td>Barang stok</td>
            <td><?php echo $brg_stok ?></td>
        </tr>
        <tr>
            <td>Barang kategori</td>
            <td><?php echo $brg_kategori ?></td>
        </tr>
        <tr>
            <td>Barang Garansi</td>
            <td><?php echo $brg_garansi ?></td>
        </tr>   
        <tr>
            <?php if ($kdbrg == $row1) { ?>
                <td colspan="2" class="table_footer">
                    <b>Barang Tidak Bisa dihapus</b>
                </td>
            <?php } else { ?>
                <td colspan="2" class="table_footer">
                    <input type="hidden" value="<?php echo $kdbrg?>" name="kdbrg">
                    <input type="hidden" value="delete_barang" name="operator">
                    <input type="submit" value="Delete">&nbsp;
                    <input type="reset" value="Batal">
                </td>
            <?php } ?>
        </tr>
    </form>
</table>