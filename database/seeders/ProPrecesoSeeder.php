<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\db;

class ProPrecesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_procesos')->insert([
            'pro_nombre' => 'Ingeniería',
            'pro_prefijo' => 'ING'
        ]);
        DB::table('pro_procesos')->insert([
            'pro_nombre' => 'Comercio',
            'pro_prefijo' => 'COM'
        ]);
        DB::table('pro_procesos')->insert([
            'pro_nombre' => 'Administrativo',
            'pro_prefijo' => 'ADM'
        ]);
        DB::table('pro_procesos')->insert([
            'pro_nombre' => 'Literatura',
            'pro_prefijo' => 'LITER'
        ]);
        DB::table('pro_procesos')->insert([
            'pro_nombre' => 'Financiero',
            'pro_prefijo' => 'FINANC'
        ]);
    }
}