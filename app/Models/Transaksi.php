<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id',
        'tipe_transaksi',
        'metode_pembayaran_id',
        'status_bayar',
        'total_harga'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function metode_pembayaran(): BelongsTo
    {
        return $this->belongsTo(MetodePembayaran::class);
    }

    public function detail_transaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
