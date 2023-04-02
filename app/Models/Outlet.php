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
        return $this->belongsTo('App\Models\Paket','paket')->onDelete(function ($paket){
            $paket->delete();
        });
    }
    public function detailtransaksi()
    {
        return $this->belongsTo('App\Models\Detail_transaksi','detailtransaksi')->onDelete(function ($detailtransaksi){
            $detailtransaksi->delete();
        });
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi','transaksi')->onDelete(function ($transaksi){
            $transaksi->delete();
        });
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user')->onDelete(function ($user){
            $user->delete();
        });
    }
}