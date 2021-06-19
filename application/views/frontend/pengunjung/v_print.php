<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Agency - Start Bootstrap Theme</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= site_url('frontend/') ?>css/styles.css" rel="stylesheet" />
</head>

<body>
	<div class="container mt-2 mb-4">
		<div class="text-center">
			<h2>Pemerintah</h2>
			<h3>kota</h3>
			<h3>nohp</h3>
		</div>
		<hr style="margin-bottom: 2px solid black;">
		<div class="text-center mt-5">
			<h5>Invoice Pemesanan Tiket Wisata</h5>
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
						<tr>
							<th>Status Pemesanan</th>
							<th>:</th>
							<th> <span class="text-danger"><?= $user->status_tiket ?></span></th>
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
	<script>
		window.print();
	</script>
</body>

</html>
