<?php

namespace App\Livewire\Siswa;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Industries extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $nama, $bidang_usaha, $alamat, $kontak, $email, $website, $industry_id;

    public function render()
    {
        return view('livewire.siswa.industries', [
            'industries' => Industry::paginate(8)
        ]);
    }

    public function edit($id)
    {
        $post = Industry::findOrFail($id);

        $this->industry_id = $id;
        $this->nama = $post->nama;
        $this->bidang_usaha = $post->bidang_usaha;
        $this->alamat = $post->alamat;
        $this->kontak = $post->kontak;
        $this->email = $post->email;
        $this->website = $post->website;
    }
}
