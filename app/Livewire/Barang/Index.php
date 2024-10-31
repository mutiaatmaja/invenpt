<?php

namespace App\Livewire\Barang;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $suka, $selectedMode;
    public function tambah()
    {
        $this->selectedMode = 'tambah';
    }
    public function batal()
    {
        $this->selectedMode = null;
    }
    public function simpan()
    {
        // $this->validate([]);
        $this->selectedMode = null;
        $this->alert('success', 'Data Berhasil Disimpan');
    }
    public function render()
    {
        return view('livewire.barang.index');
    }
}
