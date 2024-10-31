<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistem Informasi Inventory</title>
	<link type="image/png" href="{{ asset('gambar/logo.png') }}" rel="icon">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background-color: #f0f0f0;
		}

		.sidebar {
			background-color: #33cc33;
			height: 100vh;
			color: white;
			padding-top: 20px;
			width: 300px;
		}

		.sidebar .nav-link {
			color: white;
			font-weight: bold;
			border: 1px solid white;
			/* Memberikan border putih */
			border-radius: 5px;
			/* Membuat sudut border melengkung */
			margin: 5px 0;
			/* Memberi jarak antar item menu */
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			/* Tambah efek bayangan */
			border-radius: 5px;
			margin: 5px 0;
		}

		.sidebar .nav-link:hover {
			background-color: #28a745;
			/* Ubah warna sesuai keinginan */
			color: white;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			/* Efek bayangan */
			border-radius: 5px;
			/* Supaya sudut bayangan melengkung */
			/* Ubah warna teks */
			border: 1px solid #ffffff;
			/* Ubah warna border */
		}

		.sidebar .nav-link.active {
			background-color: #28a745;
			color: white;
			width: 100%;
			/* Lebar penuh untuk elemen aktif */
			text-align: left;
			/* Teks rata kiri */
			border: 2px solid #28a745;
			/* Warna hijau yang lebih menonjol */
		}

		.content {
			margin-left: 2px;
			padding: 20px;
		}

		.header {
			background-color: #33cc33;
			color: white;
			padding: 10px;
			font-weight: bold;
		}

		.content-container {
			background-color: #e0e0e0;
			padding: 20px;
			border-radius: 8px;
		}

		.table-container {
			background-color: #e0e0e0;
			padding: 20px;
			border-radius: 8px;
		}

		.btn-excel {
			background-color: #33cc33;
			color: white;
		}

		.btn-pdf {
			background-color: #ff3333;
			color: white;
		}

		.btn-pink {
			background-color: #ff69b4;
			color: white;
		}
	</style>
</head>

<body>

	<div class="d-flex">
		<!-- Sidebar -->
		<div class="sidebar d-flex flex-column align-items-center">
			<img class="mb-4" src="gambar/logo.png" alt="Logo" style="width: 80px;">
			<h5 class="px-3 text-center">Sistem Informasi Inventory</h5>
			<p class="px-3 text-center">PT. Karya Indah menu{{ $selectedMenu ?? '' }}</p>
			<nav class="nav flex-column w-150 mt-4">
				<a class="nav-link {{ Request::is('barang*') ? 'active' : '' }}" href="{{ url('/barang') }}" wire:navigate>
					<!-- Ikon Barang Masuk -->
					<svg class="bi bi-box-arrow-in-right mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M6 3.5A1.5 1.5 0 0 1 7.5 2h6A1.5 1.5 0 0 1 15 3.5v9A1.5 1.5 0 0 1 13.5 14h-6A1.5 1.5 0 0 1 6 12.5V10H5v2.5A2.5 2.5 0 0 0 7.5 15h6a2.5 2.5 0 0 0 2.5-2.5v-9A2.5 2.5 0 0 0 13.5 1h-6A2.5 2.5 0 0 0 5 3.5V6h1V3.5z"
							fill-rule="evenodd" />
						<path
							d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
							fill-rule="evenodd" />
					</svg>
					Barang Masuk
				</a>
				<a class="nav-link" href="#">
					<!-- Ikon Barang Keluar -->
					<svg class="bi bi-box-arrow-in-left mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10 3.5A1.5 1.5 0 0 0 8.5 2h-6A1.5 1.5 0 0 0 1 3.5v9A1.5 1.5 0 0 0 2.5 14h6a1.5 1.5 0 0 0 1.5-1.5V10h1v2.5A2.5 2.5 0 0 1 8.5 15h-6A2.5 2.5 0 0 1 0 12.5v-9A2.5 2.5 0 0 1 2.5 1h6A2.5 2.5 0 0 1 11 3.5V6h-1V3.5z" />
						<path
							d="M15.854 8.354a.5.5 0 0 1 0-.708l-3-3a.5.5 0 0 1 .708-.708L16.707 7.5H7.5a.5.5 0 0 1 0 1h9.207l-2.147 2.146a.5.5 0 0 1-.708-.708l3-3z" />
					</svg>
					Barang Keluar
				</a>
				<a class="nav-link" href="#">
					<!-- Ikon Transaksi Penjualan -->
					<svg class="bi bi-cart mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0 1a.5.5 0 0 1 .5-.5h1.11l.4 1.607L3.888 5.68l-.857 3.428A1.5 1.5 0 0 0 4.5 10.5h9a.5.5 0 0 1 0 1h-9a2.5 2.5 0 0 1-2.462-2.102L1.3 2H.5a.5.5 0 0 1-.5-.5zM5.3 5.41l-.823 3.294A.5.5 0 0 0 5 9.5h8a.5.5 0 0 0 .493-.41l.823-3.294H5.3z" />
						<path d="M7 4.5A1.5 1.5 0 1 1 7 1a1.5 1.5 0 0 1 0 3.5zm7 0A1.5 1.5 0 1 1 14 1a1.5 1.5 0 0 1 0 3.5z" />
					</svg>
					Transaksi Penjualan
				</a>
				<a class="nav-link" href="#">
					<!-- Ikon Transaksi Pembelian -->
					<svg class="bi bi-receipt mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M1 1.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5V4h-13V1.5zM0 4v10.5a.5.5 0 0 0 .74.447L3.5 13.07l2.26 1.88a.5.5 0 0 0 .74 0L8.76 13.07l2.26 1.88a.5.5 0 0 0 .74 0L14.76 13.07l2.26 1.88A.5.5 0 0 0 16 14.5V4h-16z" />
						<path d="M1 8h14v1H1V8zm0 2h14v1H1v-1z" />
					</svg>
					Transaksi Pembelian
				</a>
				<a class="nav-link" href="#">
					<!-- Ikon Laporan -->
					<svg class="bi bi-file-earmark-text mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M5 10.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
						<path d="M6.5 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z" />
						<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM10.5 3v2a1 1 0 0 0 1 1h2l-3-3z" />
					</svg>
					Laporan
				</a>
				<a class="nav-link" href="#">
					<!-- Ikon Karyawan -->
					<svg class="bi bi-person-fill mr-2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M3 14s-1 0-1-1 1-2 4-2 4 2 4 2 0 1-1 1H3zm1-9a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
						<path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4c0 2.5-2 4-4 4S4 6.5 4 4a4 4 0 0 1 4-4z" />
					</svg>
					Karyawan
				</a>
			</nav>
		</div>

		<!-- Content -->
		<div class="content w-100">
			<div class="header d-flex justify-content-between align-items-center">
				<h5>Sistem Informasi Inventory PT. Karya Indah</h5>
				<div class="dropdown">
					<button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-expanded="false">
						Admin
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
						<li><a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt me-2"></i>Keluar</a></li>
					</ul>
					<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
						@csrf
					</form>
				</div>
			</div>
			@isset($slot)
				{{ $slot }}
			@endisset

			<!-- Table Container -->
			{{-- <div class="table-container mt-4">
				<h5 class="mb-3">Laporan Transaksi Penjualan</h5>
				<div class="d-flex justify-content-between mb-3">
					<button class="btn btn-pink">Filter Bulan</button>
					<div>
						<button class="btn btn-excel mr-2">EXCEL</button>
						<button class="btn btn-pdf">PDF</button>
					</div>
				</div>
				<table class="table-striped table-bordered table">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>
							<th>Foto Nota</th>
							<th>Tanggal Penjualan</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
						<!-- Data rows go here -->
					</tbody>
				</table>
			</div> --}}
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<x-livewire-alert::scripts />

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</body>

</html>
