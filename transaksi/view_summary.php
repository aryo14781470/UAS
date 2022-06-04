<h2>View Summary Pelanggan</h2>
<table>
    <tr>
        <th>No</th>
        <th>Kode Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Transaksi</th>
        <th>Total Nominal</th>
    </tr>
    <?php
        $no = 1;
        $pelanggan = ambil_pelanggan();
        while ($row = mysqli_fetch_array($pelanggan)) {
            echo '<tr>';
                echo '<td align="center">'.$no.'</td>';
                echo '<td align="center">'.$row['kdpel'].'</td>';
                echo '<td>'.$row['pel_nama'].'</td>';
                $jmlTrans = 0;
                $grandTotal = 0;
                $transaksi = ambil_transaksi($row['kdpel'], 'A.kdpel');
                while ($trans = mysqli_fetch_array($transaksi)) {
                    $totalTrans = 0;
                    $detailTrans = ambil_detail_transaksi($trans['idtrans']);
                    while ($detail = mysqli_fetch_array($detailTrans)) {
                        $harga = $detail['detail_harga'];
                        $qty = $detail['detail_qty'];
                        $subtotal = $harga * $qty;
                        $totalTrans = $totalTrans + $subtotal;
                    }
                    $grandTotal = $grandTotal + $totalTrans;
                    $jmlTrans++;
                }
                echo '<td align="center">'.$jmlTrans.'</td>';
                echo '<td align="center" id="total_bayar">'.number_format($grandTotal,0,",",".").'</td>';
            echo '</tr>';
            $no++;
        }
    ?>
</table>