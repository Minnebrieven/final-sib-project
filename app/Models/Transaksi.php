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
    protected $fillable = ['id_penjualan', 'id_jenis_sampah', 'nama_penjual', 'jenis_sampah', 'jumlah', 'tgl_transaksi', 'alamat', 'foto'];

    public $timetamps = false;

    public function jenis_Sampah(): BelongsTo
    {
        return $this->belongsTo(JenisSampah::class);
    }

    public function penjual(): BelongsTo
    {
        return $this->belongsTo(Penjual::class);
    }

    public function data_transaksi(): BelongsToMany
    {
        return $this->belongsToMany(data_transaksi::class);
    }
}
