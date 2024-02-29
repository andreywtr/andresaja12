<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $buku_id= $_POST['buku_id'];
                    $user_id= $_SESSION['user']['user_id'];
                    $tanggal_peminjaman= $_POST['tanggal_peminjaman'];
                    $tanggal_pengembalian= $_POST['tanggal_pengembalian'];
                    $status_peminjaman= $_POST['status_peminjaman'];
                    $query = mysqli_query($koneksi, "UPDATE peminjaman set buku_id='$buku_id', tanggal_peminjaman='$tanggal_peminjaman', 
                    tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE peminjaman_id=$id");
                    if($query) {
                        echo '<script>alert("Ubah data berhasil"); </script>';
                        echo '<script> location.href="index.php?page=peminjaman"</script>';
                    }else{
                        echo '<script>alert("Ubah data gagal"); </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman where peminjaman_id=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-2">Buku</div>
                <div class="col-md-8">
                    <select name="buku_id" class="form-control">
                        <?php
                            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                            while($buku = mysqli_fetch_array($buk)) {
                        ?>
                                <option <?php if($buku['buku_id'] == $data['buku_id']) echo 'selected'; ?> 
                                value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['judul']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Tanggal Peminjaman</div>
                    <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" 
                            name="tanggal_peminjaman">
                </div>
                </div>
            <div class="row mb-3">
                <div class="col-md-2">Tanggal Pengembalian</div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="<?php echo $data['tanggal_pengembalian']; ?>" 
                        name="tanggal_pengembalian">
                    </div>
                </div>
            <div class="row mb-3">
                <div class="col-md-2">Status Peminjaman</div>
                    <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control">
                        <option value="dipinjam" <?php if($data['status_peminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>                  
                    <option value="dikembalikan" <?php if($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>  
                    </select>            
                 </div>
                </div>
            <div class="row mb-3">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                </div>
                </div>
        </form>
    </div>
</div>
    </div>
    </div>