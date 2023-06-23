<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\db;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tip_tipo_docs')->insert([
            'tip_nombre' => 'Instructivo',
            'tip_prefijo' => 'INS'
        ]);
        DB::table('tip_tipo_docs')->insert([
            'tip_nombre' => 'Procedimiento',
            'tip_prefijo' => 'PROC'
        ]);
        DB::table('tip_tipo_docs')->insert([
            'tip_nombre' => 'Reglamento',
            'tip_prefijo' => 'RGTO'
        ]);
        DB::table('tip_tipo_docs')->insert([
            'tip_nombre' => 'Manual',
            'tip_prefijo' => 'MAN'
        ]);
        DB::table('tip_tipo_docs')->insert([
            'tip_nombre' => 'Politica',
            'tip_prefijo' => 'POLIT'
        ]);
    }
}