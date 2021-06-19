<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style>
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		/* body {
			background: #007bff;
			background: linear-gradient(to right, #0062E6, #33AEFF);
		} */

		.card-signin {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		}

		.card-signin .card-title {
			margin-bottom: 2rem;
			font-weight: 300;
			font-size: 1.5rem;
		}

		.card-signin .card-body {
			padding: 2rem;
		}

		.form-signin {
			width: 100%;
		}

		.form-signin .btn {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
		}

		.form-label-group {
			position: relative;
			margin-bottom: 1rem;
		}

		.form-label-group input {
			height: auto;
			border-radius: 2rem;
		}

		.form-label-group>input,
		.form-label-group>label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}

		.form-label-group>label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
			width: 100%;
			margin-bottom: 0;
			/* Override default `<label>` margin */
			line-height: 1.5;
			color: #495057;
			border: 1px solid transparent;
			border-radius: .25rem;
			transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
			color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-moz-placeholder {
			color: transparent;
		}

		.form-label-group input::placeholder {
			color: transparent;
		}

		.form-label-group input:not(:placeholder-shown) {
			padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
			padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown)~label {
			padding-top: calc(var(--input-padding-y) / 3);
			padding-bottom: calc(var(--input-padding-y) / 3);
			font-size: 12px;
			color: #777;
		}

		.btn-google {
			color: white;
			background-color: #ea4335;
		}

		.btn-facebook {
			color: white;
			background-color: #3b5998;
		}

		/* Fallback for Edge
-------------------------------------------------- */

		@supports (-ms-ime-align: auto) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input::-ms-input-placeholder {
				color: #777;
			}
		}

		/* Fallback for IE
-------------------------------------------------- */

		@media all and (-ms-high-contrast: none),
		(-ms-high-contrast: active) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input:-ms-input-placeholder {
				color: #777;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<?php echo $this->session->flashdata('success') ?>
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Sign In</h5>
						<form method="POST" action="<?= site_url('auth/process') ?>" class="form-signin">
							<div class="form-label-group">
								<input type="text" id="inputEmail" name="username" class="form-control" placeholder="username" required autofocus>
								<label for="inputEmail">Username</label>
							</div>
							<div class="form-label-group">
								<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
								<label for="inputPassword">Password</label>
							</div>
							<button type="submit" name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
							<div class="custom-control mt-3 mb-3">
								<a href="" data-toggle="modal" data-target="#exampleModal">Register</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
<!-- Modal update -->
<form method="POST" action="<?= site_url('auth/save') ?>">
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Form Registrasi</h5>
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
