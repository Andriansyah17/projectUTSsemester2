<?php
include_once('layouts/header.php');
if (!empty($_GET['id'])) {
    // edit
    $_id = $_GET['id'];
    $sql = "SELECT produk.*, merk.nama_merk FROM produk INNER JOIN merk ON produk.merk_id = merk.id WHERE produk.id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} elseif (isset($_GET['iddel'])) {
    // delete
    $_id = $_GET['iddel'];
    $sql = "DELETE FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    echo "<script>alert('Data berhasil dihapus');location.href='produk.php';</script>";
} else{
    $_id = "";
}

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Form</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Form Produk
            </div>
            <div class="card-body">
                <form method="post" action="proses_produk.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" required="required" value="<?php if(isset($_GET['id'])){ echo $row['nama'];} ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="stok" class="col-4 col-form-label">Stok</label>
                        <div class="col-8">
                            <input id="stok" name="stok" type="number" class="form-control" required="required" value="<?php if(isset($_GET['id'])){ echo $row['stok'];} ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="harga" class="col-4 col-form-label">Harga</label>
                        <div class="col-8">
                            <input id="harga" name="harga" type="number" class="form-control" required="required" value="<?php if(isset($_GET['id'])){ echo $row['harga'];} ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="merk_id" class="col-4 col-form-label">Merk</label>
                        <div class="col-8">
                            <select id="merk_id" name="merk_id"  class="form-control" required="required">
                                <?php 
                                if (!empty($_GET['id'])) {
                                    echo "<option value='".$row['merk_id']."'>".$row['nama_merk']."</option>";
                                }
                                $query = "SELECT * FROM merk";
                                $stmt = $dbh->prepare($query);
                                $stmt->execute();
                                while ($rs = $stmt->fetch()) {
                                    ?>
                                    <option value="<?= $rs['id'] ?>"><?= $rs['nama_merk'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="img" class="col-4 col-form-label">Img</label>
                        <div class="col-8">
                            <input id="img" name="img" type="file" class="form-control" value="">
                            <input id="img_lama" name="img_lama" type="hidden" class="form-control" value="<?php if(isset($_GET['id'])){ echo $row['img'];} ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                        <div class="col-8">
                            <textarea id="deskripsi" name="deskripsi" class="form-control" required="required" value="<?php if(isset($_GET['id'])){ echo $row['deskripsi'];} ?>"><?php if(isset($_GET['id'])){ echo $row['deskripsi'];} ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <input type="hidden" name="id" value="<?= $_id ?>">
                            <input name="proses" type="submit" class="btn btn-primary" value="<?php if(isset($_GET['id'])){ echo "Update";}else{echo "Simpan";} ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once('layouts/footer.php') ?>