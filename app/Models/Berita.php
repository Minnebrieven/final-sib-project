<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = [
        'kategori_berita_id',
        'user_id',
        'judul',
        'url',
        'deskripsi',
        'tanggal',
        'foto'
    ];

    public function kategori_berita(): HasMany
    {
        return $this->hasMany(KategoriBerita::class);
    }
}
