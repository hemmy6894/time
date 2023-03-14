<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeTableGeneratorController extends Controller
{
    //
    public function timetable()
    {
        $cousers = [];
        $subjects = [];
        $venues = [];
        $teachers = [];
        $schedules = [];

        // List of classes and their corresponding subjects
        $classes = array(
            'Class 1' => array('Maths', 'Science', 'English'),
            'Class 2' => array('History', 'Geography', 'French'),
            'Class 3' => array('Art', 'Music', 'Physical Education')
        );

        // List of available teachers
        $teachers = array('Teacher 1', 'Teacher 2', 'Teacher 3', 'Teacher 4');

        // List of available classrooms
        $classrooms = array('Room 1', 'Room 2', 'Room 3', 'Room 4');

        // Initialize the schedule array
        $schedule = array();

        // Loop through each class
        foreach ($classes as $class => $subjects) {
            // Shuffle the list of teachers and classrooms to assign them randomly
            shuffle($teachers);
            shuffle($classrooms);

            // Loop through each subject and assign a teacher and classroom to each
            foreach ($subjects as $subject) {
                $teacher = array_pop($teachers);
                $classroom = array_pop($classrooms);

                // Add the subject, teacher, and classroom to the schedule array
                $schedule[$class][$subject] = array('teacher' => $teacher, 'classroom' => $classroom);
            }
        }

        // Display the schedule
        echo '<table>';
        echo '<tr><th>Class</th><th>Subject</th><th>Teacher</th><th>Classroom</th></tr>';
        foreach ($schedule as $class => $subjects) {
            foreach ($subjects as $subject => $data) {
                echo '<tr>';
                echo '<td>' . $class . '</td>';
                echo '<td>' . $subject . '</td>';
                echo '<td>' . $data['teacher'] . '</td>';
                echo '<td>' . $data['classroom'] . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }
}
