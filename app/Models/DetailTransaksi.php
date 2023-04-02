<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksis";
    protected $fillable = [
        'id','transaksi_id','paket_id','qty','bayar'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet','outlet_id');
    }
    
    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function paket()
    {
        return $this->belongsTo('App\Models\Paket');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function qty(){
        return $this->belongsTo('App\Models\Transaksi','transaksi');
    }
    
}