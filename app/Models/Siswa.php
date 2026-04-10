<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'kelas',
        'alamat',
        'foto',
    ];
}
