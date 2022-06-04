<h2>
    Data Master Pelanggan&nbsp;
    (<a href="index.php?page=add_pelanggan">Tambah Data</a>)
</h2>
<table>
    <tr>
        <th>No</th>
        <th>kode</th>
        <th>Nama Pelanggan</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Status Pernikahan</th>
        <th>Create</th>
        <th>Update</th>
        <th>Tools</th>
    </tr>
        <?php
            $no = 1;
            $data = ambil_pelanggan();
            while($row = mysqli_fetch_array($data)){
                $kdpel = $row['kdpel'];
                echo "<tr>";
                    echo "<td align='center'>".$no."</td>";
                    echo "<td align='center'>".$kdpel."</td>";
                    echo "<td>".$row['pel_nama']."</td>";
                    echo "<td align='center'>".jk($row['pel_jk'])."</td>";
                    echo "<td>".$row['pel_alamat']."</td>";
                    echo "<td>".$row['pel_telp']."</td>";
                    echo "<td align='center'>".kawin($row['pel_kawin'])."</td>";
                    echo "<td align='center'>".tanggal($row['pel_create'])."</td>";
                    echo "<td align='center'>".tanggal($row['pel_update'])."</td>";
                    echo "<td align='center'>";
        ?>
                            <a href="index.php?page=edit_pelanggan&kdpel=<?php echo $kdpel ?>">Update</a>&nbsp;
                            <a href="index.php?page=delete_pelanggan&kdpel=<?php echo $kdpel ?>">Delete</a>
        <?php
                    echo "</td>";
                echo "</tr>";
                $no++;
            }
        ?>
</table>