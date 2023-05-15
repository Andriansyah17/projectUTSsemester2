<?php
include_once('layouts/header.php');
if (!empty($_GET['id'])) {
    // edit
    $_id = $_GET['id'];
    $sql = "SELECT * FROM merk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} elseif (isset($_GET['iddel'])) {
    // delete
    $_id = $_GET['iddel'];
    $sql = "DELETE FROM merk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    echo "<script>alert('Data berhasil dihapus');location.href='merk.php';</script>";
} else{
    $_id = "";
}

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Form</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="merk.php">Merk</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Form Merk
            </div>
            <div class="card-body">
                <form method="post" action="proses_merk.php">
                    <div class="form-group row mb-3">
                        <label for="nama_merk" class="col-4 col-form-label">Nama Merk</label>
                        <div class="col-8">
                            <input id="nama_merk" name="nama_merk" type="text" class="form-control" required="required" value="<?php if(isset($_GET['id'])){ echo $row['nama_merk'];} ?>">
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