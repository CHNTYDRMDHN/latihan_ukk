<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\TrxEvent;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksis";
    protected $fillable = [
        'id','outlet_id','kode_invoice','member_id','tgl','batas_waktu',
        'tgl_bayar','biaya_tambahan','diskon','pajak','status','dibayar','user_id',
    ];
    protected $dispatchesEvents = [
    'creating' => \App\Listeners\TransaksiId::class,
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            // generate kode invoice
            $lastTransaksi = Transaksi::orderBy('id', 'desc')->first();
            if ($lastTransaksi) {
                $id = $lastTransaksi->id + 1;
            } else {
                $id = 1;
            }
            $kode_invoice = 'trx'.str_pad($id, 3, '0', STR_PAD_LEFT);
            $transaksi->kode_invoice = $kode_invoice;
        });

        static::created(function ($transaksi) {
            event(new TrxEvent($transaksi));
        });
    }


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
    return $this->belongsTo(Paket::class);
    }

    public function paketDetail()
    {
        return $this->belongsTo('App\Models\Paket','id','nama_paket');
    }

    public function detailtransaksi()
    {
        return $this->hasMany('App\Models\DetailTransaksi','id','qty');
    }
    public function qty(){
        return $this->hasMany('App\Models\DetailTransaksi','id','qty');
    }
}