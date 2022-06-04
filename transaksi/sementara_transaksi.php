<?php if (isset($_POST['kdbrg']) || isset($_POST['kdpel'])) { ?>
    <form action="index.php?page=add_transaksi" method="post">
        <table>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Beli</th>
                <th>SubTotal</th>
                <th>Tools</th>
            </tr>
            <?php
                $no = 1;
                $total = 0;
                $sementara = ambil_sementara();
                while ($row = mysqli_fetch_array($sementara)) {
                    $subtotal = $row['detail_harga'] * $row['detail_qty'];
                    $total = $total + $subtotal;
                    echo '<tr>';
                        echo '<td align="center">'.$no.'</td>';
                        echo '<td align="center">'.$row['kdbrg'].'</td>';
                        echo '<td>'.$row['brg_nama'].'</td>';
                        echo '<td align="center">'.number_format($row['detail_harga'],0,",",".").'</td>';
                        echo '<td align="center">'.$row['detail_qty'].'</td>';
                        echo '<td align="center">'.number_format($subtotal,0,",",".").'</td>';
                        echo '<td align="center">';
            ?>
                        <a href="index.php?page=delete_sementara&kdbrg=<?php echo $row['kdbrg'];?>&kdpel=<?php echo $kdpel ?>">Delete</a>
            <?php
                        echo '</td>';
                    echo '</tr>';
                    $no++;
                }
            ?>
            <tr>
                <td class="table_footer" colspan="7">
                    <input type="hidden" name="idtrans" value="<?php echo $idtrans ?>">
                    <input type="hidden" name="kdpel" value="<?php echo $kdpel ?>">
                    <input type="hidden" name="operator" value="add_transaksi">
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
<?php } ?>
<script type="text/javascript">
    document.getElementById('total_bayar').innerHTML = "<?php echo number_format($total,0,",","."); ?>";
</script>
