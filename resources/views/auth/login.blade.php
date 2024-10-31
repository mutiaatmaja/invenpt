<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			background-color: #f4f4f4;
			/* Warna latar belakang */
		}

		.login-container {
			background-color: #33cc33;
			/* Warna latar belakang kotak */
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			width: 300px;
			/* Lebar kotak */
			text-align: center;
			/* Rata tengah teks */
		}

		.logo {
			width: 100px;
			/* Lebar logo */
			margin-bottom: 20px;
			/* Jarak antara logo dan form */
		}

		h2 {
			margin-bottom: 20px;
			color: white;
			/* Warna teks judul */
		}

		.input-group {
			margin-bottom: 15px;
			text-align: left;
			/* Rata kiri teks untuk label */
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #fff;
			/* Warna label */
		}

		input {
			width: 90%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 100px;
		}

		.form-check {
			margin-top: 10px;
		}

		button {
			width: 100%;
			padding: 10px;
			background-color: #28a745;
			/* Warna tombol */
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #218838;
			/* Warna tombol saat hover */
		}

		.invalid-feedback {
			color: #dc3545;
			/* Warna untuk feedback error */
			display: none;
			/* Tersembunyi secara default */
		}

		.is-invalid+.invalid-feedback {
			display: block;
			/* Tampilkan saat input invalid */
		}
	</style>
</head>

<body>
	<div class="login-container">
		<img class="logo" src="{{ asset('gambar/logo.png') }}" alt="Logo">
		<h2>Login</h2>
		<form method="POST" action="{{ route('login') }}">
			@csrf

			<div class="input-group">
				<span class="invalid-feedback" role="alert">
					<strong>test</strong>
				</span>
				<label for="email">{{ __('Email Address') }}</label>
				<input class="is-invalid @error('email') is-invalid @enderror" id="email" name="email" type="email"
					value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda">
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="input-group">
				<label for="password">{{ __('Password') }}</label>
				<input class="@error('password') is-invalid @enderror" id="password" name="password" type="password" required
					autocomplete="current-password" placeholder="Masukkan password Anda">
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<button type="submit">{{ __('Login') }}</button>

		</form>
	</div>
</body>

</html>
