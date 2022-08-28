<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /** Category Seed
     * - Erstellt eine neue Kategorie
     * - Bearbeitet eine vorhandene Kategorie
     * 
     * @return void
     */

    /*
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach(range(1,5) as $id)
        {
            Category::insert([
                'id' => $id,
                'name' => $faker->sentence(3)
            ]);
        }
    }
}

