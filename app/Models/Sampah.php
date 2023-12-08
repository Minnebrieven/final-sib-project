<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sampah extends Model
{
    use HasFactory;
    
    protected $table = 'sampah';
    protected $fillable = [
        'nama',
        'jenis_sampah_id',
        'satuan',
        'harga'
    ];

    public function jenis_sampah(): BelongsTo
    {
        return $this->belongsTo(JenisSampah::class);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
