<script type="text/javascript">
    function cek_qty() {
        if (document.getElementById('detail_qty').value == '') {
            alert('Qty tidak boleh kosong.');
            document.getElementById('detail_qty').focus();
            return false;
        }else{ return true; }
    }
</script>
<?php if (isset($_POST['kdpel'])) { ?>
    <form action="index.php?page=add_transaksi" method="post" onsubmit="return cek_qty()">
        <table>
            <tr>
                <th colspan="5">Detail Pembelian</th>
            </tr>
            <tr>
                <td>Kode barang</td>
                <td>Qty</td>
                <td rowspan="2" align="center">
                    <input type="submit" value="Beli">
                </td>
            </tr>
            <tr>
                <td>
                    <select name="kdbrg">
                        <?php
                            $brg =  ambil_barang();
                            while($row = mysqli_fetch_array($brg)){
                                echo '<option value="'.$row['kdbrg'].'">'.'('.$row['kdbrg'].') &nbsp;
                                     '.$row['brg_nama'].' - '.$row['brg_harga'].
                                     '</option>';
                            }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="idtrans" value="<?php echo $idtrans ?>">
                    <input type="hidden" name="operator" value="add_sementara">
                    <input type="hidden" name="kdpel" value="<?php echo $kdpel ?>">
                    <input type="text" name="detail_qty" id="detail_qty" maxlength="2" size="2">
                </td>
            </tr>
        </table>
        <br>
    </form>
<?php } ?>