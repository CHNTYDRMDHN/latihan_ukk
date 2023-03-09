<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksi";
    protected $fillable = [
        'id', 'transaksi_id', 'paket_id', 'qty'
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
