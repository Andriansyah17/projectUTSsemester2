<?php
include_once('layouts/header.php');
if (!empty($_GET['id'])) {
    // edit
    $_id = $_GET['id'];
    $sql = "SELECT produk.*, merk.nama_merk FROM produk INNER JOIN merk ON produk.merk_id = merk.id WHERE produk.id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch(); ?>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="assets/produk/<?= $row['img'] ?>" alt="<?= $row['nama'] ?>" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-<?= $row['id'] ?></div>
                    <h1 class="display-5 fw-bolder"><?= $row['nama'] ?></h1>
                    <div class="fs-5 mb-5">
                        Rp. <span class="text-decoration-line-through"><?= number_format($row['harga'] * 1.2) ?></span>
                        <span><?= number_format($row['harga']) ?></span>
                    </div>
                    <p class="lead"><?= $row['deskripsi'] ?></p>
                    <form action="pesanan.php" method="post">
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="num" value="1" style="max-width: 3rem" required />
                            <input type="hidden" name="produk_id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="produk" value="<?= $row['nama'] ?>">
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = "SELECT produk.*, merk.nama_merk FROM produk INNER JOIN merk ON produk.merk_id = merk.id WHERE produk.merk_id=? AND produk.id !=? LIMIT 4";
                $stmt = $dbh->prepare($query);
                $stmt->execute([$row['merk_id'], $row['id']]);
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) { ?>
                    <div class="col mb-5">
                        <div class="card">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                <a href="index.php?merk_id=<?= $row['merk_id'] ?>" class="text-light text-decoration-none"><?= $row['nama_merk'] ?></a>
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top img-thumbnail" style="height: 250px;" src="assets/produk/<?= $row['img'] ?>" alt="<?= $row['nama'] ?>" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder"><a href="detail-produk.php?id=<?= $row['id'] ?>" class="text-dark text-decoration-none"><?= $row['nama'] ?></a></h6>
                                    <!-- Product price-->
                                    Rp. <span class="text-muted text-decoration-line-through"><?= number_format($row['harga'] * 1.2) ?></span>
                                    <?= number_format($row['harga']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
include_once('layouts/footer.php') ?>