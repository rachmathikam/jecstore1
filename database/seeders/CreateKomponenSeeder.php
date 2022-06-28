<?php

namespace Database\Seeders;
use App\Models\Komponen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CreateKomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $komponen = Komponen::create([
            'komponen' => '7+',
            'harga' => 'RP.200.000'
        ]);
    }
}
