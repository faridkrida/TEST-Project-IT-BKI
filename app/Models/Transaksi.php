<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'jumlah', 'total_harga', 'tanggal_transaksi'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
