<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriBerita extends Model
{
    use HasFactory;
    protected $table = 'kategori_berita';
    protected $fillable = ['nama'];

    public $timetamps = false;

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class);
    }
}
