 	<div class="page-section">
 		<div class="container">
 			<div class="d-flex justify-content-between">
 				<nav aria-label="breadcrumb">
 					<ol class="breadcrumb">
 						<li class="breadcrumb-item">
 							<?php
								if ($wisata->harga > 0) { ?>
 								<a class="btn btn-info" href="<?= site_url('transaksi/pesan/' . $wisata->id_wisata) ?>">Beli Tiket</a>
 							<?php } else { ?>
 								<div class="alert alert-primary" role="alert">
 									Objek Wisata Ini Tidak Dipungut Biaya, Selamat berwisata,
 								</div>
 							<?php  } ?>
 						</li>
 					</ol>
 				</nav>
 			</div>
 			<div class="d-flex justify-content-center mt-4 mb-4">
 				<img class="img-fluid" src="<?= site_url('wisata/' . $wisata->foto) ?>">
 			</div>
 			<h3 class="text-center">Wisata <?= $wisata->nama_wisata ?></h3>
 			<p>
 				<?= $wisata->detail ?>
 			</p>
 		</div>
 	</div>
