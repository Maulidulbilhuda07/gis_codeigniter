<section class="page-section">
	<div class="container mt-4">
		<div class="text-center">
			<h5>Update Data Berita</h5>
		</div>
		<form method="POST" action="<?= site_url('beritaa/update') ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label for="judul">Judul</label>
				<input type="hidden" value="<?= $berita->id_berita ?>" name="id_berita" class="form-control" id="judul">
				<input type="text" value="<?= $berita->judul ?>" name="judul" class="form-control" id="judul">
			</div>
			<div class="form-group">
				<label for="isi">Isi</label>
				<textarea id="isi_edit" name="isi_edit" class="form-control" rows="5"><?= $berita->isi ?></textarea>
			</div>
			<div class="form-group">
				<label for="foto">Foto</label>
				<input type="file" name="foto" class="form-control" id="foto">
			</div>
			<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save</button>
		</form>
	</div>
</section>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('isi');
	CKEDITOR.replace('isi_edit');
</script>
