<?php

use App\Course;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class, 50)->create()->each(function ($subject) {
            $courses = Course::all()->random(3)->pluck('id');
            $subject->courses()->attach($courses);
        });
    }
}
