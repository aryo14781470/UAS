<?php
    $transaksi = ambil_transaksi($_GET['idtrans'], 'idtrans');
    while($row = mysqli_fetch_array($transaksi)){
        $idtrans = $row['idtrans'];
        $trans_tgl = $row['trans_tgl'];
        $pel_nama = $row['pel_nama'];
        $pel_alamat = $row['pel_alamat'];
        $pel_telp = $row['pel_telp'];
    }
?>
<h2>View Detail Transaksi</h2>
<table>
    <tr>
        <th colspan="2">Informasi Transaksi</th>
    </tr>
    <tr>
        <td width="200">ID Transaksi</td>
        <td><?php echo $idtrans; ?></td>
    </tr>
    <tr>
        <td width="200">Tanggal</td>
        <td><?php echo date('d-M-Y', strtotime($trans_tgl)); ?></td>
    </tr>
    <tr>
        <td width="200">Nama Pelanggan</td>
        <td><?php echo $pel_nama; ?></td>
    </tr>
    <tr>
        <td width="200">Alamat</td>
        <td><?php echo $pel_alamat; ?></td>
    </tr>
    <tr>
        <td width="200">Telp</td>
        <td><?php echo $pel_telp; ?></td>
    </tr>
</table>
<table>
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total</th>
    </tr>
    <?php
        $no = 1;
        $subtotal = 0;
        $detail_transaksi = ambil_detail_transaksi($idtrans);
        while ($det = mysqli_fetch_array($detail_transaksi)) {
            echo '<tr>';
                echo '<td align="center">'.$no.'</td>';
                echo '<td align="center">'.$det['kdbrg'].'</td>';
                echo '<td>'.$det['brg_nama'].'</td>';
                echo '<td align="center">'.number_format($det['detail_harga']).'</td>';
                echo '<td align="center">'.$det['detail_qty'].'</td>';
                $total = $det['detail_harga'] * $det['detail_qty'];
                $subtotal = $total + $subtotal;
                echo '<td align="center">'.number_format($total).'</td>';
            echo '</tr>';
            $no++;
        }
    ?>
            <tr>
                <td colspan="5" align="center">Subtotal</td>
                <td align="center" id="total_bayar">
                    <?php echo number_format($subtotal)?>
                </td>
            </tr>
</table>
