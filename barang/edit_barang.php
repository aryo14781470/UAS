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
?>
<h2>
    Edit Barang &nbsp;
    (<a href="index.php?page=master_barang">View Barang</a>)
</h2>
<table>
    <form action="index.php?page=master_barang" method="post">
        <tr>
            <td>Kode</td>
            <td><?php echo $kdbrg ?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>
                <input type="text" name="brg_nama" maxlength="25" size="20" value="<?php echo $brg_nama ?>">
            </td>
        </tr>
        <tr>
            <td>Barang Stok</td>
            <td>
                <input type="text" name="brg_stok" maxlength="5" size="3" value="<?php echo $brg_stok ?>">
            </td>
        </tr>
        <tr>
            <td>Barang Harga</td>
            <td>
                <input type="text" name="brg_harga" maxlength="10" size="8" value="<?php echo $brg_harga ?>">
            </td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="brg_kategori" size="1">
                    <?php echo '<option value="'.$brg_kategori.'">'.$brg_kategori.'</option>'; ?>
                    <option value="HARD DISK">HARD DISK</option>
                    <option value="USB FLASH DISK">USB FLASH DISK</option>
                    <option value="MEMORY">MEMORY</option>
                    <option value="CASING">CASING</option>
                    <option value="EAR PHONE">EAR PHONE</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Garansi</td>
            <td>
                <?php
                    if($brg_garansi == 1){
                        echo '<input type="radio" value="1" name="brg_garansi" cheked="cheked">Bergaransi &nbsp; ';
                        echo '<input type="radio" value="0" name="brg_garansi">Tidak Bergaransi';
                    }else{
                        echo '<input type="radio" value="1" name="brg_garansi">Bergaransi &nbsp; ';
                        echo '<input type="radio" value="0" name="brg_garansi" cheked="cheked">Tidak Bergaransi';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <th colspan="2" class="table_footer">
                <input type="hidden" value="<?php echo $kdbrg?>" name="kdbrg">
                <input type="hidden" value="edit_barang" name="operator">
                <input type="submit" value="Update">&nbsp;
                <input type="reset" value="Batal">
            </th>
        </tr>
    </form>
</table>