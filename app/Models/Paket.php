<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    
    protected $table = "pakets";
    protected $fillable = [
        'id','outlet_id','jenis','nama_paket','harga'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet');
    }
    public function detailtransaksi()
    {
        return $this->hasMany('App\Models\DetailTransaksi','id')->onDelete(function ($detailtransaksi){
            $detailtransaksi->delete();
        });
    }
    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi','transaksi')->onDelete(function ($transaksi){
            $transaksi->delete();
        });
    }
    public function transaksiDetail()
    {
        return $this->hasMany('App\Models\Transaksi','transaksi')->onDelete(function ($transaksi){
            $transaksi->delete();
        });
    }
}