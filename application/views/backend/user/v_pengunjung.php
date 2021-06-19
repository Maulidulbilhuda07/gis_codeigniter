<div class="d-flex justify-content-between mb-4 mt-4">
	<h5 class="font-weight-bold">Data Pengunjung</h5>
	<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah <i class="fas fa-plus"></i></button> -->
</div>
<?php echo $this->session->flashdata('success') ?>
<?php echo $this->session->flashdata('delete') ?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Username</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Nohp</th>
			<!-- <th>Action</th> -->
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($user as $key => $value) { ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $value->name ?></td>
				<td><?= $value->username ?></td>
				<td><?= $value->alamat ?></td>
				<td><?= $value->jk ?></td>
				<td><?= $value->nohp ?></td>
				<!-- <td>
					<button data-toggle="modal" id="select" data-id_user="<?= $value->id_user ?>" data-name="<?= $value->name ?>" data-alamat="<?= $value->alamat ?>" data-nohp="<?= $value->nohp ?>" data-jk="<?= $value->jk ?>" data-username="<?= $value->username ?>" data-password="<?= $value->password ?>" data-target="#update" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
					<a onclick="return confirm('Yakin Hapus Data Ini.?')" class="btn btn-sm btn-danger" href="<?= site_url('user/delete/') . $value->id_user ?>"><i class="fas fa-trash"></i></a>
				</td> -->
			</tr>
		<?php  } ?>
	</tbody>
</table>
