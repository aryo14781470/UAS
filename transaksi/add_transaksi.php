<h2>Add Transaksi</h2>
<form action="index.php?page=add_transaksi" method="post">
    <table>
        <tr>
            <th colspan="4">Data Pelanggan</th>
        </tr>
        <tr>
            <td>ID Transaksi</td>
            <td>
                <?php
                    if (isset($_POST['kdpel'])) {
                        $idtrans = set_idtrans();
                        echo $idtrans;
                    }else{
                        delete_sementara();
                    }
                ?>
            </td>
            <td>Tanggal</td>
            <td><?php echo date('d M Y'); ?></td>
        </tr>
        <tr>
            <td>Kode Pelanggan</td>
            <td>
                <?php
                    if (isset($_POST['kdpel'])) {
                        $pel = ambil_pelanggan($_POST['kdpel']);
                        while ($row = mysqli_fetch_array($pel)) {
                            echo '('.$row['kdpel'].') &nbsp;'.$row['pel_nama']; $kdpel = $row['kdpel'];
                        }
                    }else {
                        echo '<select name="kdpel">';
                                $pel = ambil_pelanggan();
                                while($row = mysqli_fetch_array($pel)){
                                    echo '<option value="'.$row['kdpel'].'">'.'('.$row['kdpel'].') &nbsp;'.$row['pel_nama'].'</option>';
                                }
                        echo '</select>';
                    }
                ?>
            </td>
            <td>Total Bayar</td>
            <td>
                <div id="total_bayar"></div>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="table_footer">
                <?php
                    if (isset($_POST['kdpel'])) {
                        echo '<input type="submit" value="cancel">';
                    }else {
                        echo '<input type="submit" value="add">';
                    }
                ?>
            </td>
        </tr>
    </table>
    <br>
</form>
<?php include('detail_transaksi.php')?>
<?php include('sementara_transaksi.php');?>
