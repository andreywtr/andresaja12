<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if($_SESSION['user']['level'] !='peminjam'){
            ?>
                <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
                <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                        <td>
                            <?php
                    if($_SESSION['user']['level'] !='peminjam'){
                ?>
                            <a href="?page=buku_ubah&&id=<?php echo $data['buku_id']; ?>" class="btn btn-primary"><i
                                    class="fa fa-fw fa-edit">ubah</i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"
                                href="?page=buku_hapus&&id=<?php echo $data['buku_id']; ?>" class="btn btn-danger"><i
                                    class="fa fa-fw fa-trash">hapus</i></a>
                            <?php
                        }
                ?>
                            <?php
                    if($_SESSION['user']['level'] !='admin'){
                ?>
                            <?php
                    if($_SESSION['user']['level'] !='petugas'){
                ?>
                            <a href="?page=peminjaman_tambah&&id=<?php echo $data['buku_id']; ?>"
                                class="btn btn-primary">Pinjam</a>
                            <?php
                        }
                ?>
                            <?php
                        }
                ?>
                        </td>
                    </tr>
                    <?php
                        }
                ?>

                </table>
            </div>
        </div>
    </div>
</div>