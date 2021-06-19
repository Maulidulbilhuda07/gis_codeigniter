	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<section class="page-section">
		<div class="container">
			<div class="text-center mt-4 mb-4">
				<h5> Riwayat Pemesana Tiket Wisata <?= $user->name ?></h5>
			</div>
			<?php echo $this->session->flashdata('success') ?>
			<?php echo $this->session->flashdata('delete') ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Wisata</th>
						<th>Harga Tiket</th>
						<th>Jumlah Tiket</th>
						<th>Total Bayar</th>
						<th>Tanggal Pemesanan</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($history as $key => $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama_wisata ?></td>
							<td>Rp. <?= number_format($value->harga_tiket) ?></td>
							<td><?= $value->jumlah_tiket ?></td>
							<td>Rp. <?= number_format($value->harga_tiket * $value->jumlah_tiket) ?></td>
							<td><?= $value->tgl_pembelian ?></td>
							<td><?= $value->status_tiket ?></td>
							<td>
								<?php if ($value->status_tiket == "Pending") { ?>
									<div class="col">
										<a class="btn btn-danger" href="<?= site_url('transaksi/delete/' . $value->id_pembelian) ?>"><i class="fas fa-trash"></i></a>
										<button type="button" id="select" data-id_pembelian="<?= $value->id_pembelian ?>" data-name="<?= $user->name ?>" data-id_user="<?= $user->id_user ?>" data-id_wisata="<?= $value->id_wisata ?>" data-nama_wisata="<?= $value->nama_wisata ?>" data-jumlah_tiket="<?= $value->jumlah_tiket ?>" data-harga_tiket="<?= $value->harga_tiket ?>" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
											Konfirmasi
										</button>
									</div>
								<?php	} else { ?>
									<a class="btn btn-primary" href="<?= site_url('transaksi/detail/' . $value->id_pembelian) ?>"><i class="fas fa-eye"></i></a>
								<?php	} ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Modal -->
	<form method="POST" action="<?= site_url('transaksi/konfirmasi') ?>" enctype="multipart/form-data">
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="id_wisata" class="form-control" id="id_wisata" readonly>
							<input type="hidden" name="id_pembelian" class="form-control" id="id_pembelian" readonly>
							<label for="name">Nama</label>
							<input type="text" name="name" class="form-control" id="name" readonly>
						</div>
						<div class="form-group">
							<label for="nama_wisata">Nama Wisata</label>
							<input type="text" name="nama_wisata" class="form-control" id="nama_wisata" readonly>
						</div>
						<div class="form-group">
							<label for="harga_tiket"> Harga Tiket</label>
							<input type="text" name="harga_tiket" class="form-control" id="harga_tiket" readonly>
						</div>
						<div class="form-group">
							<label for="jumlah_tiket">Jumlah Tiket</label>
							<input type="text" name="jumlah_tiket" class="form-control" id="jumlah_tiket" readonly>
						</div>
						<div class="form-group">
							<label for="total_bayar">Total Bayar</label>
							<input type="text" name="total_bayar" class="form-control" id="total_bayar" readonly>
						</div>
						<div class="form-group">
							<label for="pembayaran">Pembayaran</label>
							<input type="number" name="pembayaran" class="form-control" id="pembayaran" placeholder="Masukkan Jumlah Transfer" required>
						</div>
						<div class="form-group">
							<label for="bukti_pembayaran">Bukti Pembayaran</label>
							<input type="file" name="foto" class="form-control" id="foto" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Kirim</button>
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
				var id_wisata = $(this).data('id_wisata');
				var id_pembelian = $(this).data('id_pembelian');
				var nama_wisata = $(this).data('nama_wisata');
				var jumlah_tiket = $(this).data('jumlah_tiket');
				var harga_tiket = $(this).data('harga_tiket');
				$('#id_user').val(id_user);
				$('#name').val(name);
				$('#nama_wisata').val(nama_wisata);
				$('#id_wisata').val(id_wisata);
				$('#jumlah_tiket').val(jumlah_tiket);
				$('#harga_tiket').val(harga_tiket);
				$('#id_pembelian').val(id_pembelian);
				$('#total_bayar').val(harga_tiket * jumlah_tiket);
			})
		})
	</script>
