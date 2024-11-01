<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\Barangkeluar as Barang;

class Barangkeluar extends Component
{
    use LivewireAlert, WithFileUploads;
    public $suka, $selectedMode;
    //wiremodel dari barang/index.blade.php
    public $nama_barang, $jumlah, $ukuran, $foto_barang, $tanggal_masuk, $barang_selected;
    public function tambah()
    {
        $this->reset(['nama_barang', 'jumlah', 'ukuran', 'foto_barang', 'tanggal_masuk']);
        $this->selectedMode = 'tambah';
    }
    public function batal()
    {
        $this->selectedMode = null;
    }
    public function simpan()
    {
        if ($this->selectedMode == 'tambah') {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah' => 'required',
                'ukuran' => 'required',
                'foto_barang' => 'required',
                'tanggal_masuk' => 'required'
            ]);
            $simpan = new Barang();
        } else {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah' => 'required',
                'ukuran' => 'required',
                'tanggal_masuk' => 'required'
            ]);
            $simpan = $this->barang_selected;
        }

        $simpan->nama = $this->nama_barang;
        $simpan->jumlah = $this->jumlah;
        $simpan->ukuran = $this->ukuran;
        if ($this->foto_barang) {
            $this->foto_barang->store('gambarbarang', 'public');
            $simpan->foto = $this->foto_barang->hashName();
        }
        $simpan->tanggal_masuk = $this->tanggal_masuk;
        $simpan->save();

        $this->reset(['nama_barang', 'jumlah', 'ukuran', 'foto_barang', 'tanggal_masuk', 'selectedMode']);
        $this->alert('success', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $this->barang_selected = Barang::find($id);
        $this->nama_barang = $this->barang_selected->nama;
        $this->jumlah = $this->barang_selected->jumlah;
        $this->ukuran = $this->barang_selected->ukuran;
        $this->tanggal_masuk = $this->barang_selected->tanggal_masuk;
        $this->selectedMode = 'edit';
    }
    public function hapus($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        $this->alert('success', 'Data Berhasil Dihapus');
    }
    public function render()
    {
        $barangs = Barang::all();
        return view('livewire.barangkeluar')->with([
            'barangs' => $barangs
        ]);
    }
}
