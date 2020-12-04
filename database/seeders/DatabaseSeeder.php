<?php

namespace Database\Seeders;

use App\Models\Arrondissement;
use App\Models\Fabricant;
use App\Models\Pays;
use App\Models\Quartier;
use App\Models\User;
use App\Models\Ville;
use Database\Factories\QuartierFactory;
use Database\Factories\VilleFactory;
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
//        User::factory(10)->create();
        Pays::factory(10)->create();
        Ville::factory(10)->create();
        Arrondissement::factory(10)->create();
        Quartier::factory(100)->create();
        Fabricant::factory(10)->create();
    }
}
