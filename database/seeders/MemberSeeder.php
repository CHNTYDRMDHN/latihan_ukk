<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Member::create([
            'nama'  => 'dia',
            'alamat' => 'indonesia',
            'jenis_kelamin' => 'L',
            'tlp'  => '0865'
        ]);
    }
}
