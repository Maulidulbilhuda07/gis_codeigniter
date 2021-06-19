<section class="page-section">
	<div class="container mt-4">
		<div class="text-center mt-4 mb-4">
			<h5>List Berita dan Artikel</h5>
		</div>
		<div class="row">
			<?php foreach ($berita as $key => $value) { ?>
				<div class="col-md-3">
					<a href="<?= site_url('home/IsiBerita/' . $value->id_berita) ?>">
						<div class="card">
							<img class="card-img-top" src="<?= site_url() ?>/berita/<?= $value->foto ?>" alt="Card image cap">
							<div class="card-body">
								<p class="card-text"><?= $value->judul ?></p>
							</div>
					</a>
					<div class="card-footer">
						<small class="text-muted"><?= $value->tgl_publish ?></small>
					</div>
				</div>

		</div>
	<?php } ?>
	</div>
	</div>
</section>
