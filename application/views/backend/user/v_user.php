<div class="d-flex justify-content-between mb-4 mt-4">
	<h5 class="font-weight-bold">Data Admin</h5>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah <i class="fas fa-plus"></i></button>
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
			<th>Action</th>
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
				<td>
					<button data-toggle="modal" id="select" data-id_user="<?= $value->id_user ?>" data-name="<?= $value->name ?>" data-alamat="<?= $value->alamat ?>" data-nohp="<?= $value->nohp ?>" data-jk="<?= $value->jk ?>" data-username="<?= $value->username ?>" data-password="<?= $value->password ?>" data-target="#update" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
					<a onclick="return confirm('Yakin Hapus Data Ini.?')" class="btn btn-sm btn-danger" href="<?= site_url('user/delete/') . $value->id_user ?>"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php  } ?>
	</tbody>
</table>
<!-- Modal  addd-->
<form method="POST" action="<?= site_url('user/save') ?>">
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="nohp">Nohp</label>
						<input type="text" name="nohp" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label>
						<select class="form-control" required name="jk">
							<option value="">--Pilih--</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"> Save <i class="fas fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Modal update -->
<form method="POST" action="<?= site_url('user/update') ?>">
	<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Data Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="hidden" name="id_user" class="form-control" required id="id_user">
						<input type="text" name="name" class="form-control" required id="name">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" class="form-control" required id="alamat">
					</div>
					<div class="form-group">
						<label for="nohp">Nohp</label>
						<input type="text" name="nohp" class="form-control" required id="nohp">
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label>
						<select id="jk" class="form-control" required name="jk">
							<option value="">--Pilih--</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" required id="username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" required id="password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"> Save <i class="fas fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$(document).ready(function($) {
		$(document).on('click', '#select', function() {
			var id_user = $(this).data('id_user');
			var name = $(this).data('name');
			var alamat = $(this).data('alamat');
			var nohp = $(this).data('nohp');
			var jk = $(this).data('jk');
			var username = $(this).data('username');
			$('#id_user').val(id_user);
			$('#name').val(name);
			$('#nohp').val(nohp);
			$('#alamat').val(alamat);
			$('#jk').val(jk);
			$('#username').val(username);
		})
	})
</script>
