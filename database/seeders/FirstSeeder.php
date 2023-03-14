<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Day;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 0; $i < 5;$i++){
            Course::create([
                "name" => fake()->unique()->word()
            ]);
        }

        for($i = 0; $i < 20;$i++){
            Subject::create([
                "name" => fake()->unique()->word()
            ]);
        }

        $subs = [];
        $i = 1;
        foreach(Subject::get() as $subject){
            $subs[] = $subject->id;
            if(count($subs) == 5){
                $course = Course::where("id",$i)->first();
                foreach($subs as $sub){
                    CourseSubject::create([
                        "subject_id" => $sub,
                        "course_id" => $course->id,
                    ]);
                }
                $i++;
                $subs = [];
            }
        }

        for($i = 0; $i < 12;$i++){
            Venue::create([
                "name" => fake()->unique()->city()
            ]);
        }

        for($i = 0; $i < 10;$i++){
            Teacher::create([
                "name" => fake()->unique()->name()
            ]);
        }

        foreach(["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"] as $name){
            Day::create([
                "name" => $name
            ]);
        }
    }
}
