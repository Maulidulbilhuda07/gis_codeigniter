 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
 <div class="d-flex justify-content-center mb-4 mt-4">
 	<h5 class="font-weight-bold">Update Data Objek Wisata</h5>
 </div>
 <form method="POST" action="<?= site_url('wisataa/update') ?>" enctype="multipart/form-data">
 	<div class="row">
 		<div class="col-md-6">
 			<div class="form-group">
 				<input type="hidden" id="id_wisata" value="<?= $wisata->id_wisata ?>" name="id_wisata" class="form-control" required>
 				<label for="nama_wisata" class="control-label">Nama Wisata</label>
 				<input type="text" id="nama_wisata" value="<?= $wisata->nama_wisata ?>" name="nama_wisata" class="form-control" required>
 			</div>
 			<div class="form-group">
 				<label for="alamat_wisata" class="control-label">Alamat Wisata</label>
 				<input type="text" id="alamat_wisata" value="<?= $wisata->alamat_wisata ?>" name="alamat_wisata" class="form-control" required>
 			</div>
 			<div class="form-group">
 				<label for="detail_wisata" class="control-label">Detail</label>
 				<textarea name="detail" id="detail" rows="5"><?= $wisata->detail ?></textarea>
 			</div>
 			<div class="form-group">
 				<label for="foto_wisata" class="control-label">Foto Wisata</label>
 				<input type="file" id="foto_wisata" name="foto" class="form-control">
 			</div>
 			<div class="form-group">
 				<label for="harga">Harga Tiket</label>
 				<input type="number" value="<?= $wisata->harga ?>" name="harga" class="form-control" id="harga">
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div id="mapid" style="width: 100%; height: 480px;"></div>
 			<div class="form-group">
 				<label for="lat" class="control-label">Lattitude</label>
 				<input type="text" id="lat" value="<?= $wisata->lat ?>" name="lat" class="form-control" readonly>
 			</div>
 			<div class="form-group">
 				<label for="lng" class="control-label">Longgitude</label>
 				<input type="text" id="lng" value="<?= $wisata->lng ?>" name="lng" class="form-control" readonly>
 			</div>
 			<button name="submit" class="btn btn-primary">Simpan</button>
 		</div>
 	</div>
 </form>
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
 <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
 <script>
 	CKEDITOR.replace('detail');
 </script>
 <script>
 	var curLocation = [0, 0];
 	if (curLocation[0] == 0 && curLocation[1] == 0) {
 		curLocation = [-0.928256, 100.370694];
 	}
 	var map = L.map('mapid').setView([-0.928256, 100.370694], 14);
 	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
 		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
 	}).addTo(map);
 	map.attributionControl.setPrefix(false);
 	var marker = new L.marker(curLocation, {
 		draggable: 'true'
 	});
 	marker.on('dragend', function(event) {
 		var position = marker.getLatLng();
 		marker.setLatLng(position, {
 			draggable: 'true'
 		}).bindPopup(position).update();
 		$("#lat").val(position.lat);
 		$("#lng").val(position.lng).keyup();
 	});
 	$("#lat, #lng").change(function() {
 		var position = [parseInt($("#lat").val()), parseInt($("#lng").val())];
 		marker.setLatLng(position, {
 			draggable: 'true'
 		}).bindPopup(position).update();
 		map.panTo(position);
 	});
 	map.addLayer(marker);
 </script>
