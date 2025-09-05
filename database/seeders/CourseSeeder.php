<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'name' => 'Sample Course 1',
            'description' => 'Description for sample course 1',
        ]);

        Course::create([
            'name' => 'Sample Course 2',
            'description' => 'Description for sample course 2',
        ]);
    }
}