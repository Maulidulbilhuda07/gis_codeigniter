<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="page-section">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h5>Form Pemesanan Tiket Wisata</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img class="img-fluid" src="<?= site_url('wisata/' . $wisata->foto) ?>">
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">
								<form method="POST" action="<?= site_url('transaksi/save') ?>">
									<input type="hidden" value="<?= $wisata->id_wisata ?>" name="id_wisata" class="form-control" id="nama" readonly>
									<div class="form-group">
										<label for="nama">Nama Wisata</label>
										<input type="text" value="<?= $wisata->nama_wisata ?>" name="nama" class="form-control" id="nama" readonly>
									</div>
									<div class="form-group">
										<label for="harga">Harga Tiket Per Orang</label>
										<input type="text" name="harga_tiket" value="<?= $wisata->harga ?>" class="form-control" id="harga" readonly>
									</div>
									<div class="form-group">
										<label for="tgl_pembelian">Tanggal Pembelian</label>
										<input type="date" name="tgl_pembelian" class="form-control" id="tgl_pembelian" required>
									</div>
									<div class="form-group">
										<label for="jumlah_tiket">Jumlah Tiket</label>
										<input type="number" name="jumlah_tiket" class="form-control" id="jumlah_tiket" required>
									</div>
									<div class="form-group">
										<label for="total_bayar">Total Bayar</label>
										<input type="number" name="total_bayar" class="form-control" id="total_bayar" readonly>
									</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Nama Pemesan</label>
									<input type="text" value="<?= $user->name ?>" name="name" class="form-control" id="name" readonly>
								</div>
								<div class="form-group">
									<label for="nohp">Nohp</label>
									<input type="text" value="<?= $user->nohp ?>" name="nohp" class="form-control" id="nohp" readonly>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<input type="text" value="<?= $user->alamat ?>" name="alamat" class="form-control" id="alamat" readonly>
								</div>
								<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function($) {
		$('#jumlah_tiket').keyup('input', function() {
			var harga = $('#harga').val();
			var jumlah_tiket = $('#jumlah_tiket').val();
			$('#total_bayar').val(harga * jumlah_tiket);
		});
	});
</script>
