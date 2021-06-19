<div class="d-flex justify-content-between mb-4 mt-4">
	<h5 class="font-weight-bold">Laporan Data Pemsanan Tiket</h5>
	<a class="btn btn-info" target="_blank" href="<?= site_url('laporan/print') ?>"><i class="fas fa-print"></i> Print</a>
</div>
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
