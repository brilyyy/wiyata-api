<?php

namespace Database\Seeders;

use App\Models\Course\RefCourseLevel;
use Illuminate\Database\Seeder;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'Beginner',
            'Intermediate',
            'Advanced',
            'Expert',
        ];

        foreach ($levels as $level) {
            RefCourseLevel::create([
                'name' => $level,
            ]);
        }
    }
}
