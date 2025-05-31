<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    /** @use HasFactory<\Database\Factories\InternshipFactory> */
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai',
    ];

    public function siswa() {
        return $this->belongsTo(Student::class);
    }

    public function guru() {
        return $this->belongsTo(Teacher::class);
    }

    public function industri() {
        return $this->belongsTo(Industry::class);
    }
}
