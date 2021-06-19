<div class="d-flex justify-content-between mb-4 mt-4">
	<h5 class="font-weight-bold">Data Berita</h5>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah <i class="fas fa-plus"></i></button>
</div>
<?php echo $this->session->flashdata('success') ?>
<?php echo $this->session->flashdata('delete') ?>
<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($berita as $key => $value) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value->judul ?></td>
					<td> <img src="<?= site_url() ?>/berita/<?= $value->foto ?>" width="200"></td>
					<td>
						<a class="btn  btn-sm btn-warning" href="<?= site_url('beritaa/edit/' . $value->id_berita) ?>"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus Data Ini.?')" class="btn btn-sm btn-danger" href="<?= site_url('beritaa/delete/') . $value->id_berita ?>"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			<?php  } ?>
		</tbody>
	</table>
</div>
<!-- Modal  addd-->
<form method="POST" action="<?= site_url('Beritaa/save') ?>" enctype="multipart/form-data">
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" name="judul" class="form-control">
					</div>
					<div class="form-group">
						<label for="isi">Isi</label>
						<textarea name="isi" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"> Save <i class="fas fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('isi');
	CKEDITOR.replace('isi_edit');
</script>
