<h2>
    Data Master Barang &nbsp;
    (<a href="index.php?page=add_barang">Tambah Data</a>)
</h2>
<table>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Garansi</th>
        <th>Create</th>
        <th>Update</th>
        <th>Tools</th>
    </tr>
    <?php
        $no = 1;
        $data = ambil_barang();
        while($row = mysqli_fetch_array($data)){
            $kdbrg = $row['kdbrg'];
            echo "<tr>";
                echo "<td align='center'>".$no."</td>";
                echo "<td align='center'>".$kdbrg."</td>";
                echo "<td>".$row['brg_nama']."</td>";
                echo "<td align='center'>".$row['brg_stok']."</td>";
                echo "<td align='center'>".number_format($row['brg_harga'])."</td>";
                echo "<td>".$row['brg_kategori']."</td>";
                echo "<td align='center'>".garansi($row['brg_garansi'])."</td>";
                echo "<td align='center'>".tanggal($row['brg_create'])."</td>";
                echo "<td align='center'>".tanggal($row['brg_update'])."</td>";
                echo "<td align='center'>";
    ?>
                        <a href="index.php?page=edit_barang&kdbrg=<?php echo $kdbrg ?>">Update</a>&nbsp;
                        <a href="index.php?page=delete_barang&kdbrg=<?php echo $kdbrg ?>">Delete</a>
    <?php
                echo "</td>";
            echo "</tr>";
            $no++;
        }
    ?>
</table>