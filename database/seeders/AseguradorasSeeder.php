<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AseguradorasSeeder extends Seeder
{
    public function run()
    {
        DB::table('aseguradoras')->insert([
            [
                'nombre' => 'Aseguradora Salud Plus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Aseguradora Vida Segura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
