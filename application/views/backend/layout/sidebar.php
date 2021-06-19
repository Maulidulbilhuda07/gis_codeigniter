<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dinas Pariwisata</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= site_url('backend/css/styles.css') ?>" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

</head>

<body>
	<div class="d-flex" id="wrapper">
		<div class="border-end bg-white" id="sidebar-wrapper">
			<div class="sidebar-heading border-bottom bg-light">Dinas Pariwisata</div>
			<div class="list-group list-group-flush">
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('dashboard') ?>">Home</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('user') ?>">Admin</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('user/pengunjung') ?>">Pengunjung</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('wisataa') ?>">Wisata</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('beritaa') ?>">Berita</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('transaksi/alldata') ?>">Pemesanan Tiket</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('laporan') ?>">Laporan</a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
