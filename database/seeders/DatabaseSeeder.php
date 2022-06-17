<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Airport::factory()->count(5)->create();

        \App\Models\Kunde::factory()->count(5)->create();
        \App\Models\Inhalt::factory()->count(5)->create();
        \App\Models\Artikel::factory()->count(5)->create();
        \App\Models\Bestellung::factory()->count(5)->create();
        \App\Models\Konfiguration::factory()->count(5)->create();
        \App\Models\BestellPosition::factory()->count(5)->create();
        \App\Models\BestellteKonfiguration::factory()->count(5)->create();
    }
}
