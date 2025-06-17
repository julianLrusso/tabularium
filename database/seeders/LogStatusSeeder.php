<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('log_statuses')->insert([
            ['name' => 'Wishlist', 'plural_name' => 'Wishlist'],
            ['name' => 'Por Jugar', 'plural_name' => 'Por jugar'],
            ['name' => 'Jugando', 'plural_name' => 'Jugando'],
            ['name' => 'Completado', 'plural_name' => 'Completados'],
            ['name' => 'Jugado', 'plural_name' => 'Jugados'],
            ['name' => 'Abandonado', 'plural_name' => 'Abandonados'],
        ]);
    }
}
