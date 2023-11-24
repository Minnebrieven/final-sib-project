<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class DataTransaksi extends Model
{
    use HasFactory;
    protected $table = 'data_transaksi';
    protected $fillable = ['nama_sampah','harga','id_transaksi','id_jenis_sampah'];

    public $timetamps = false;

    public function jenis_Sampah(): BelongsTo
    {
        return $this->belongsTo(JenisSampah::class);
    }

    public function transaksi(): BelongsToMany
    {
        return $this->belongsToMany(Transaksi::class);
    }
}

