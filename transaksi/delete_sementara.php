<?php
    $data = ambil_sementara($_GET['kdbrg']);
    $data2 = ambil_barang($_GET['kdbrg']);
    $row = mysqli_fetch_array($data);
    $row2 = mysqli_fetch_array($data2);
        $idtrans = $row['idtrans'];
        $kdbrg2 = $row['kdbrg'];
        $brg_nama = $row2['brg_nama'];
        $detail_qty = $row['detail_qty'];
        $brg_stok = $row2['brg_stok'];
        $detail_harga = $row['detail_harga'];
?>
<h2>
    Delete Pembelian
</h2>
<form action="index.php?page=add_transaksi" method="post">
    <table>    
        <tr>
            <td colspan="2" class="table_footer">
                <input type="hidden" value="<?php echo $_GET['kdbrg']; ?>" name="kdbrg">
                <input type="hidden" value="<?php echo $_GET['kdpel']; ?>" name="kdpel">
                <input type="submit" value="Back">
            </td>
        </tr>
    </table>
</form>
<table>
    <form action="index.php?page=add_transaksi" method="post">
        <tr>
            <td>Kode Transaksi</td>
            <td><?php echo $idtrans ?></td>
        </tr>
        <tr>
            <td>Kode barang</td>
            <td><?php echo $kdbrg2 ?></td>
        </tr>
        <tr>
            <td>Nama barang</td>
            <td><?php echo $brg_nama ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><?php echo $detail_harga ?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><?php echo $brg_stok ?></td>
        </tr>
        <tr>
            <td>Jumlah Beli</td>
            <td><?php echo $detail_qty ?></td>
        </tr>
        <tr>
            <td colspan="2" class="table_footer">
                <input type="hidden" value="<?php echo $kdbrg2 ?>" name="kdbrg2">
                <input type="hidden" value="<?php echo $_GET['kdpel']; ?>" name="kdpel">
                <input type="hidden" value="delete_sementara" name="operator">
                <input type="submit" value="Delete">
            </td>
        </tr>
    </form>
</table>