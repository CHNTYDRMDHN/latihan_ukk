<?php

namespace App\Events;

use App\Models\Transaksi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\DB;

class TrxEvent implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    public $transaksi;

    /**
     * Create a new event instance.
     *
     * @param  Transaksi  $transaksi
     * @return void
     */
    public function __construct(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        // Ubah kode transaksi menjadi trx{id}
        $this->transaksi->kode_invoice = 'trx' . str_pad($this->transaksi->id, 3, '0', STR_PAD_LEFT);
        $this->transaksi->save();

        // Kirim email notifikasi ke admin
    }
}