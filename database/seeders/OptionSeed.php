<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Question;
use Illuminate\Database\Seeder;

// Option Seed
// - create a new Option
// - edit a existing option
// - delete an existing option

class OptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $questions = Question::all();

        foreach($questions as $question)
        {
            $correctOption = rand(1,4);

            foreach(range(1,4) as $index)
            {
                $question->questionOptions()->create([
                    'option_text' => $faker->unique()->word,
                    'points' => $index == $correctOption ? 1 : 0,
                ]);
            }
        }
    }
}
