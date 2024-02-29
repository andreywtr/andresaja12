<h1 class="mt-4">user</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if($_SESSION['user']['level'] !='peminjam'){
            ?>
            <?php
            if($_SESSION['user']['level'] !='admin'){
        ?>
                <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
                
                <?php
                }
                ?>
                <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                    <tr>
                        <th>no</th>
                        <th>nama</th>
                        <th>username</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM user");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td>
                            <?php
                    if($_SESSION['user']['level'] !='peminjam'){
                ?>
                <?php
                    if($_SESSION['user']['level'] !='admin'){
                ?>
                            <a href="?page=user&&id=<?php echo $data['user_id']; ?>" class="btn btn-primary"><i
                                    class="fa fa-fw fa-edit"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"
                                href="?page=user&&id=<?php echo $data['user_id']; ?>" class="btn btn-danger"><i
                                    class="fa fa-fw fa-trash"></i></a>
                            <?php
                        }
                ?>
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