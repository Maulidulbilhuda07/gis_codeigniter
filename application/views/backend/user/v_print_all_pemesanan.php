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
			<h5>Laporan Pemesanan Tiket Wisata</h5>
		</div>
		<br>
		<br>
		<?php echo $this->session->flashdata('success') ?>
		<?php echo $this->session->flashdata('delete') ?>
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Nama Wisata</th>
						<th>HargaTiket</th>
						<th>Jumlah Tiket</th>
						<th>Total Bayar</th>
						<th>Tanggal Pembelian</th>
						<th>Status Tiket</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($pemesanan as $key => $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->name ?></td>
							<td><?= $value->nama_wisata ?></td>
							<td>Rp. <?= number_format($value->harga_tiket) ?></td>
							<td><?= $value->jumlah_tiket ?></td>
							<td>Rp. <?= number_format($value->harga_tiket * $value->jumlah_tiket) ?></td>
							<td><?= $value->tgl_pembelian ?></td>
							<td><?= $value->status_tiket ?></td>
						</tr>
					<?php  } ?>
				</tbody>
			</table>
		</div>
	</div>
	<script>
		window.print();
	</script>
</body>

</html>
