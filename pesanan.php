<?php include_once('layouts/header.php') ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="card">
            <?php
            if (isset($_POST['proses'])) {
                // inser pdo
                $query = "INSERT INTO pesanan (produk_id, quantity) VALUES (?, ?)";
                $stmt = $dbh->prepare($query);
                $stmt->execute([$_POST['produk_id'], $_POST['quantity']]);
            ?>
                <div class="card-header text-dark bg-white">Detail Order</div>
                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM produk WHERE id = ?";
                            $stmt = $dbh->prepare($query);
                            $stmt->execute([$_POST['produk_id']]);
                            $row = $stmt->fetch();
                            $total = $row['harga'] * $_POST['quantity'];
                            ?>
                            <tr>
                                <td><?= date('d F Y') ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= number_format($row['harga']) ?></td>
                                <td><?= $_POST['quantity'] ?></td>
                                <td><?= number_format($row['harga'] * $_POST['quantity']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="pesanan.php" class="btn btn-primary text-center mr-3">Pesan lagi</a>
                    <a href="index.php" class="btn btn-secondary text-center">Beranda</a>
                </div>
            <?php } else {
            ?>
                <div class="card-header text-dark bg-white">Form Order</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group row mb-3">
                            <label for="produk_id" class="col-4 col-form-label">Produk</label>
                            <div class="col-8">
                                <select id="produk_id" name="produk_id" class="form-control" required="required">
                                    <?php
                                    if (!empty($_POST['produk_id'])) {
                                        echo "<option value='" . $_POST['produk_id'] . "'>" . $_POST['produk'] . "</option>";
                                    }
                                    $query = "SELECT * FROM produk";
                                    $stmt = $dbh->prepare($query);
                                    $stmt->execute();
                                    while ($rs = $stmt->fetch()) {
                                    ?>
                                        <option value="<?= $rs['id'] ?>">
                                            <?= $rs['nama'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="quantity" class="col-4 col-form-label">Quantity Produk</label>
                            <div class="col-8">
                                <input id="quantity" name="quantity" type="number" min="1" class="form-control" required="required" value="<?php if (!empty($_POST['produk_id'])) {
                                                                                                                                                echo $_POST['quantity'];
                                                                                                                                            } else {
                                                                                                                                                echo 1;
                                                                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <input name="proses" type="submit" class="btn btn-primary" value="order">
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php include_once('layouts/footer.php') ?>