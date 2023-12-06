<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriBerita extends Model
{
    use HasFactory;
    protected $table = 'kategori_berita';
    protected $fillable = ['nama'];

    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class);
    }
}
