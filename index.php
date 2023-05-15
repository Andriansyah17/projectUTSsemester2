<?php include_once('layouts/header.php') ?>
<section class="py-5">
	<div class="container px-4 px-lg-5 mt-5">
		<h2 class="fw-bolder mb-4 text-center border-bottom">  
			<?php
			if (isset($_GET['merk_id'])) {
				$query = "SELECT * FROM merk WHERE id = " . $_GET['merk_id'];
				$stmt = $dbh->prepare($query);
				$stmt->execute();
				$row = $stmt->fetch();
				echo "Produk " . $row['nama_merk'];
			} else {
				echo "Semua Produk";
			}
			?>
		</h2>
		<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php
			if (isset($_GET['merk_id'])) {
				$query = "SELECT produk.*, merk.nama_merk FROM produk INNER JOIN merk ON produk.merk_id = merk.id WHERE merk_id = " . $_GET['merk_id'] . " ORDER BY rand() ";
			} else {
				$query = "SELECT produk.*, merk.nama_merk FROM produk INNER JOIN merk ON produk.merk_id = merk.id ORDER BY rand()";
			}
			$stmt = $dbh->prepare($query);
			$stmt->execute();
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) { ?>
				<div class="col mb-5">
					<div class="card">
						<!-- Sale badge-->
						<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
							<a href="?merk_id=<?= $row['merk_id'] ?>" class="text-light text-decoration-none"><?= $row['nama_merk'] ?></a>
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
		<?php
		if (isset($_GET['merk_id'])) {
		?>
			<div class="d-flex justify-content-center">
				<a href="index.php" class="btn btn-primary">Semua Produk</a>
			</div>
		<?php } ?>
	</div>
</section>
<?php include_once('layouts/footer.php') ?>