<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = [
        'berita_id',
        'nama',
        'komentar',
    ];
    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
