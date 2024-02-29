<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                    ?>
                Total Kategori</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                ?>
                Total Buku</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                ?>
                Total Ulasan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <?php
    if($_SESSION['user']['level'] !='peminjam'){
?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
            <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                ?>
                Total User</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=user">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<?php
        }
    ?>

<?php
    if($_SESSION['user']['level'] !='peminjam'){
?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>
<h4>Laporan Peminjaman Buku</h4>
<table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
    </tr>
    <?php
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
<?php
    }
?>
    </tr>
</table>
</div>
</tr>
</tr>
</div>
</div>
</div>
</div>