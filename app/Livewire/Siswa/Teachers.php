<?php

namespace App\Livewire\Siswa;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Teachers extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $nama, $nip, $gender, $alamat, $kontak, $email, $teacher_id;

    public function render()
    {
        return view('livewire.siswa.teachers', [
            'teachers' => Teacher::paginate(8)
        ]);
    }

    public function edit($id)
    {
        $post = Teacher::findOrFail($id);

        $this->teacher_id = $id;
        $this->nama = $post->nama;
        $this->nip = $post->nip;
        $this->gender = $post->gender;
        $this->alamat = $post->alamat;
        $this->kontak = $post->kontak;
        $this->email = $post->email;
    }
}
