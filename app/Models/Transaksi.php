<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksis";
    protected $fillable = [
        'id', 'outlet_id', 'kode_invoice', 'member_id', 'tgl', 'batas_waktu', 
        'tgl_bayar', 'biaya_tambahan', 'diskon', 'pajak', 'status', 'dibayar', 'user_id'
    ];
    public function outlet()
    {
        return $this->hasOne('App\Models\Outlet', 'id', 'outlet_id');
    }
    public function member()
    {
        return $this->hasOne('App\Models\Member', 'id', 'member_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function paket()
    {
        return $this->hasOne('App\Models\Paket', 'id', 'paket_id');
    }
}