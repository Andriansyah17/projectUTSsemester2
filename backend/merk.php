<?php include_once('layouts/header.php') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Merk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Merk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Table
            </div>
            <div class="card-body">
                <a href="form_merk.php" class="btn btn-primary w-100 mb-2">Tambah Data</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Merk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM merk";
                        $stmt = $dbh->prepare($query);
                        $stmt->execute();
                        $no = 1;
                        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_merk'] ?></td>
                                <td>
                                    <a href="form_merk.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="form_merk.php?iddel=<?= $row['id'] ?>" class="btn btn-danger" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['nama_merk'] ?>?')) {return false}">Delete</a>
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