<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Exercise;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the Table First
        DB::table('exercises')->truncate();

        // Names
        $names = [
            'Sit Stay',
            'Crate Hold',
            'Situps',
            'Rollover',
            'Heel',
            'Touch',
        ];

        foreach ($names as $name) {
            Exercise::create(['name' => $name]);
        }
    }
}
