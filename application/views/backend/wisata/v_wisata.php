<div class="d-flex justify-content-between mb-4 mt-4">
	<h5 class="font-weight-bold">Data Objek Wisata Kota Padang</h5>
	<a class="btn btn-info" href="<?= site_url('wisataa/add') ?>"> Tambah <i class="fas fa-plus"></i></a>
</div>
<?php echo $this->session->flashdata('success') ?>
<?php echo $this->session->flashdata('delete') ?>
<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Alamat</th>
				<th>Lattitude</th>
				<th>Longgitude</th>
				<th>Foto</th>
				<th>Harga Tiket</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($wisata as $key => $value) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value->nama_wisata ?></td>
					<td><?= $value->alamat_wisata ?></td>
					<td><?= $value->lat ?></td>
					<td><?= $value->lng ?></td>
					<td> <img src="<?= site_url() ?>/wisata/<?= $value->foto ?>" width="200"></td>
					<td>IDR. <?= number_format($value->harga) ?></td>
					<td>
						<a class="btn btn-sm btn-warning" href="<?= site_url('wisataa/edit/') . $value->id_wisata ?>"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus Data Ini.?')" class="btn btn-sm btn-danger" href="<?= site_url('wisataa/delete/') . $value->id_wisata ?>"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			<?php  } ?>
		</tbody>
	</table>
</div>
