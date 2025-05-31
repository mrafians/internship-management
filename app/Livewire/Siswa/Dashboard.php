<?php

namespace App\Livewire\Siswa;

use App\Models\Industry;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Teacher;
use Auth;
use Flux\Flux;
use Livewire\Component;

class Dashboard extends Component
{
    public $siswa_id, $guru_id, $industri_id, $mulai, $selesai;
    
    public function mount()
    {
        $students = Student::where('email', Auth::user()->email)->first();
        
        if ($students) {
            $this->siswa_id = $students->id;
        }
    }

    public function render()
    {
        $students = Student::where('email', Auth::user()->email)->first();

        return view('livewire.siswa.dashboard', [
            'internships' => Internship::with('siswa', 'guru', 'industri')->where('siswa_id', $students->id)->first(),
            'daftarGuru' => Teacher::all(),
            'daftarIndustri' => Industry::all(),
            'daftarSiswa' => Student::all(),
        ]);
    }

    public function resetInputFields()
    {
        $this->industri_id = '';
        $this->guru_id = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'siswa_id' => ['required', 'exists:students,id'],
            'industri_id' => ['required', 'exists:industries,id'],
            'guru_id' => ['required', 'exists:teachers,id'],
            'mulai' => ['required', 'date'],
            'selesai' => ['required', 'date', 'after:mulai'],
        ]);

        Internship::create($validated);
        
        $students = Student::find($this->siswa_id);
        $students->update(['status_pkl' => 1]);
        
        $this->resetInputFields();
        Flux::modal('add-intern')->close();
    }

    public function edit()
    {
        $students = Student::where('email', Auth::user()->email)->first();
        $post = Internship::where('siswa_id', $students->id)->first();

        if ($post) {
            $this->siswa_id = $post->siswa_id;
            $this->industri_id = $post->industri_id;
            $this->guru_id = $post->guru_id;
            $this->mulai = $post->mulai;
            $this->selesai = $post->selesai;
        }
    }

    public function update()
    {
        $this->validate([
            'siswa_id' => ['required'],
            'industri_id' => ['required'],
            'guru_id' => ['required'],
            'mulai' => ['required'],
            'selesai' => ['required'],
        ]);

        $students = Student::where('email', Auth::user()->email)->first();
        $post = Internship::where('siswa_id', $students->id)->first();

        if ($post) {
            $post->update([
                'siswa_id' => $this->siswa_id,
                'industri_id' => $this->industri_id,
                'guru_id' => $this->guru_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);
        }

        Flux::modal('edit-intern')->close();
    }

    public function delete()
    {
        $students = Student::where('email', Auth::user()->email)->first();
        $post = Internship::where('siswa_id', $students->id)->first();

        if ($post) {
            $post->delete();
        }

        $students = Student::find($this->siswa_id);
        $students->update(['status_pkl' => 0]);
    }
}
