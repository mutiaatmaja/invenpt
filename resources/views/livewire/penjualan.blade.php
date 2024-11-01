<div>
	<x-loading />
	<div class="table-container mt-4">
		<h5 class="mb-3">Transaksi Penjualan</h5>
		<div class="d-flex justify-content-between mb-3">
			@if ($selectedMode == 'tambah')
				<button class="btn btn-success" wire:click='batal'>Batal</button>
			@else
				<button class="btn btn-pink" wire:click='tambah'>+ Tambah Transaksi Penjualan</button>
			@endif

			<div class="d-flex">
				<input class="form-control me-2" type="text" placeholder="Cari Barang">
				<button class="btn btn-success">Cari</button>
			</div>
		</div>
		@if ($selectedMode == 'tambah' || $selectedMode == 'edit')
			<form wire:submit="simpan">
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="nama_barang">Nama Barang</label>
					<div class="col-sm-10">
						<input class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" type="text"
							wire:model="nama_barang" placeholder="Masukkan nama barang">
						@error('nama_barang')
							<div class="invalid-feedback">
								Nama barang harus diisi
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="jumlah">Jumlah</label>
					<div class="col-sm-10">
						<input class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" type="number"
							wire:model="jumlah" placeholder="Masukkan jumlah barang">
						@error('jumlah')
							<div class="invalid-feedback">
								Jumlah harus diisi dengan angka
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="ukuran">Ukuran</label>
					<div class="col-sm-10">
						<input class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" type="text"
							wire:model="ukuran" placeholder="Masukkan ukuran barang">
						@error('ukuran')
							<div class="invalid-feedback">
								Ukuran harus diisi
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3" wire:key='foto'>
					<label class="col-sm-2 form-label" for="foto_barang">Foto Barang</label>
					<div class="col-sm-10">
						<input class="form-control @error('foto_barang') is-invalid @enderror" id="foto_barang" type="file"
							wire:model.defer="foto_barang" accept="image/*">
						@error('foto_barang')
							<div class="invalid-feedback">
								Foto barang harus diunggah
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="tanggal_masuk">Tanggal Masuk</label>
					<div class="col-sm-10">
						<input class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" type="date"
							wire:model="tanggal_masuk">
						@error('tanggal_masuk')
							<div class="invalid-feedback">
								Tanggal masuk harus diisi
							</div>
						@enderror
					</div>
				</div>
				<div class="row align-items-center mb-3">
					<label class="col-sm-2 form-label" for="harga">Harga</label>
					<div class="col-sm-10">
						<input class="form-control @error('harga') is-invalid @enderror" id="harga" type="number" wire:model="harga">
						@error('harga')
							<div class="invalid-feedback">
								Tanggal masuk harus diisi
							</div>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 offset-sm-2">
						<button class="btn btn-primary" type="submit" wire:loading.attr='disabled'>Simpan</button>
					</div>
				</div>
			</form>
		@endif
		<hr />
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($barangs as $barang)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $barang->nama }}</td>
						<td>{{ $barang->jumlah }}</td>
						<td>{{ $barang->ukuran }}</td>
						<td>
							<img class="img-fluid" src="{{ asset('/storage/gambarbarang/' . $barang->foto) }}"
								alt="{{ $barang->nama_barang }}" style="max-width: 100px">
						</td>
						<td>{{ $barang->tanggal_masuk }}</td>
						<td>{{ $barang->harga }}</td>
						<td>
							<div class="d-flex">
								<button class="btn btn-warning me-2" wire:click='edit({{ $barang->id }})'>Edit</button>
								<button class="btn btn-danger" wire:click='hapus({{ $barang->id }})'
									wire:confirm='Anda akan menghapus Barang :: {{ $barang->nama }} ::'>Hapus</button>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
