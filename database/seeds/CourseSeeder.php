<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Curso-taller: Conduce Con💯te',
        ];

        foreach ($courses as $course)
            Course::create($course);
    }
}
