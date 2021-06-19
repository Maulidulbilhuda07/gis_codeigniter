 	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
 	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
 	<style>
 		.image img {
 			height: 200px;
 			width: 200px;
 		}

 		.nama {
 			font-size: 14px;
 			margin-top: 5px;
 		}
 	</style>
 	<div class="page-section">
 		<div class="container">
 			<div class="text-center mt-4 mb-4">
 				<h5>Data Objek Wisata</h5>
 			</div>
 			<div id="mapid" style="width: 100%; height: 700px;"></div>
 		</div>
 	</div>
 	<script>
 		var mymap = L.map('mapid').setView([-0.928256, 100.370694], 14);
 		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
 			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
 		}).addTo(mymap);
 		<?php foreach ($wisata as $key => $peta) {  ?>
 			L.marker([<?= $peta->lat ?>, <?= $peta->lng ?>]).addTo(mymap)
 				.bindPopup("<span class='judul'>Detail Wisata</span><hr>" +
 					"<div class='nama'><?= $peta->nama_wisata ?></div>" +
 					"<br><div class='image'><img src='<?= base_url('wisata/') . $peta->foto ?>'></div><br>" +
 					"<a class='btn btn-sm btn-info'href='<?= site_url('home/detail/' . $peta->id_wisata) ?>'>Detail</a>");
 		<?php } ?>
 	</script>
