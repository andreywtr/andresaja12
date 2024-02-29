<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspasing="0" cellpadding="5" width="100%">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
    </tr>
    <?php
            include "koneksi.php";
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.user_id = peminjaman.user_id 
                LEFT JOIN buku on buku.buku_id = peminjaman.buku_id");
                while($data = mysqli_fetch_array($query)){
                    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['judul']; ?></td>
        <td><?php echo $data['tanggal_peminjaman']; ?></td>
        <td><?php echo $data['tanggal_pengembalian']; ?></td>
        <td><?php echo $data['status_peminjaman']; ?></td>
    </tr>
    <?php
                          }
                    ?>
</table>
<script>
    window.print();
    setTimeout(function () {
        window.close();
    }, 100);
</script>