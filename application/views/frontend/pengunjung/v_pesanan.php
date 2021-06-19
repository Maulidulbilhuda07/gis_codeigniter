<section class="page-section">
	<div class="container">
		<div class="float-left">
			<a class="btn btn-warning" target="_blank" href="<?= site_url('transaksi/print/' . $user->id_pembelian) ?>"><i class="fas fa-print"></i> Print Invoice</a>
		</div>
		<div class="text-center">
			<h5>Data Pemesanan Tiket Wisata</h5>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
				<div class="text-center">
					<h5>Data Pemesan Tiket</h5>
				</div>
				<div class="table-responsive-md mt-4">
					<table class="table table-striped">
						<tr>
							<th>Nama</th>
							<th>:</th>
							<th><?= $user->name ?></th>
						</tr>
						<tr>
							<th>Nohp</th>
							<th>:</th>
							<th><?= $user->nohp ?></th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<th><?= $user->alamat ?></th>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<h5>Data Objek Wisata</h5>
				</div>
				<div class="table-responsive-md mt-4">
					<table class="table table-striped">
						<tr>
							<th>Nama Wisata</th>
							<th>:</th>
							<th><?= $user->nama_wisata ?></th>
						</tr>
						<tr>
							<th>Alamat Wisata</th>
							<th>:</th>
							<th><?= $user->alamat_wisata ?></th>
						</tr>
						<tr>
							<th>Tanggal Pemesanan Tiket</th>
							<th>:</th>
							<th> <?= $user->tgl_pembelian ?></th>
						</tr>
						<tr>
							<th>Harga Tiket</th>
							<th>:</th>
							<th>Rp. <?= number_format($user->harga_tiket) ?></th>
						</tr>
						<tr>
							<th>Jumlah Tiket</th>
							<th>:</th>
							<th><?= $user->jumlah_tiket ?></th>
						</tr>
						<tr>
							<th>Total Pembayaran</th>
							<th>:</th>
							<th>Rp. <?= number_format($user->jumlah_tiket  * $user->harga_tiket)  ?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="mt-4">
			<div class="alert alert-info" role="alert">
				Silahkan Melakukan Pembayaran Ke Rekening Bni xxxxxx Atas Nama aaaaa sebesar Rp. <span class="text-danger"><?= number_format($user->jumlah_tiket  * $user->harga_tiket)  ?></span>
			</div>
		</div>
	</div>
</section>
