<?php include_once('layouts/header.php');
if (isset($_GET['iddel'])) {
    $_id = $_GET['iddel'];
    $sql = "DELETE FROM pesanan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    echo "<script>alert('Data berhasil dihapus');location.href='pesanan.php';</script>";
}

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT pesanan.*, produk.nama, produk.harga, pesanan.quantity * produk.harga AS total FROM pesanan INNER JOIN produk ON pesanan.produk_id = produk.id";
                        $stmt = $dbh->prepare($query);
                        $stmt->execute();
                        $no = 1;
                        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= number_format($row['harga']) ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= number_format($row['total']) ?></td>
                                <td>
                                    <a href="?iddel=<?= $row['id'] ?>" class="btn btn-danger" onclick="if(!confirm('Anda Yakin Hapus Data ini?')) {return false}">Delete</a>
                                </td>
                            </tr>
                        <?php  }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include_once('layouts/footer.php') ?>