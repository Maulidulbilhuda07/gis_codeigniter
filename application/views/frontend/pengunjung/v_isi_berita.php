<section class="page-section">
	<div class="container">
		<div class="col">
			<div class="float-left mr-4">
				<img src="<?= site_url() ?>/berita/<?= $berita->foto ?>" class="img-fluid" width="300">
			</div>
			<h3 style="font-size: 18px;"><?= $berita->judul ?></h3>
			<br>
			<div class="isi">
				<?= $berita->isi ?>
			</div>
		</div>
	</div>
</section>
