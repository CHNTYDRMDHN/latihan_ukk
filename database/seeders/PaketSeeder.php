<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Paket::create([
            'outlet_id'  => '1',
            'jenis'      => 'selimut',
            'nama_paket' => 'biasa',
            'harga'      => '10000'
        ],
        [ 
            'outlet_id'  => '1',
            'jenis'      => 'bed_cover',
            'nama_paket' => 'luar biasa',
            'harga'      => '20000'
        ]);
    }
}
