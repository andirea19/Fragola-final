<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class QuestionSeed extends Seeder
{
    /** Question Seed macht
     * - Erstellt eine neue Frage
     * - Bearbeitet eine vorhandene Frage
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $categories = Category::all();

        foreach($categories as $category)
        {
            foreach(range(1,2) as $index)
            {
                $category->categoryQuestions()->create([
                    'question_text' => $faker->sentence(4)
                ]);
            }
        }
    }
}
