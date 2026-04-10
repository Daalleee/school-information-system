<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'foto',
        'user_id',
        'kategori_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
