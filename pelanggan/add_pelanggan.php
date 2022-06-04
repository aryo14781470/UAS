<h2>
    Add Pelanggan &nbsp;
    (<a href="index.php?page=master_pelanggan">View Pelanggan</a>)
</h2>
<table>
    <form action="index.php?page=master_pelanggan" method="post">
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kdpel" maxlength="10" size="10"></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="pel_nama" mxlength="25" size="20"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="pel_jk" value="1">Pria&nbsp;
                <input type="radio" name="pel_jk" value="0">Wanita
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="pel_alamat" cols="50" rows="4"></textarea></td>
        </tr>
        <tr>
            <td>Telp</td>
            <td><input type="text" name="pel_telp" maclength="25" size="20"></td>
        </tr>
        <tr>
            <td>Status Pernikahan</td>
            <td>
                <input type="radio" name="pel_kawin" value="0">Belum Menikah&nbsp;
                <input type="radio" name="pel_kawin" value="1">sudah Menikah&nbsp;
                <input type="radio" name="pel_kawin" value="2">Janda / Duda
            </td>
        </tr>
        <tr>
            <td colspan="2" class="table_footer">
                <input type="hidden" name="operator" value="add_pelanggan">
                <input type="submit" value="Tambah">&nbsp;
                <input type="reset" value="Batal">
            </td>
        </tr>
    </form>
</table>