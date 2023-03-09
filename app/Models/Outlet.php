<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlets';
    protected $fillable = [
        'nama', 'alamat', 'tlp'
    ];
    public function paket()
    {
        return $this->belongsTo('App\Models\Paket', 'paket');
    }
    public function detail_transaksis()
    {
        return $this->belongsTo('App\Models\DetailTransaksi', 'detail_transaksis');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi', 'transaksi');
    }
}
