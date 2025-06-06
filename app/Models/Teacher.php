<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'gender',
        'alamat',
        'kontak',
        'email',
    ];

    public function internship() {
        return $this->hasMany(Internship::class);
    }
}
