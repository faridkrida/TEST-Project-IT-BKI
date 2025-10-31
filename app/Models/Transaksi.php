<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'jumlah', 'total_harga', 'tanggal_transaksi'];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Event model: otomatis kurangi stok produk saat transaksi dibuat
    protected static function booted()
    {
        static::created(function ($transaksi) {
            $produk = $transaksi->produk;

            if ($produk && $produk->stok >= $transaksi->jumlah) {
                // Kurangi stok
                $produk->decrement('stok', $transaksi->jumlah);
            }
        });
    }
}
