<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        $cousers = [];
        $subjects = [];
        $venues = [];
        $teachers = [];
        $schedules = [];
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();
        });
        Schema::create("subjects", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();
        });
        Schema::create("course_subjects", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id");
            $table->bigInteger("subject_id");
            $table->timestamps();
        });
        Schema::create("venues", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();
        });
        Schema::create("venue_subjects", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("venue_id");
            $table->bigInteger("subject_id");
            $table->timestamps();
        });
        Schema::create("teachers", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();
        });
        Schema::create("teacher_subjects", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("teacher_id");
            $table->bigInteger("subject_id");
            $table->timestamps();
        });
        Schema::create("days", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();
        });
        Schema::create("schedules", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id");
            $table->bigInteger("venue_id");
            $table->bigInteger("teacher_id");
            $table->bigInteger("subject_id");
            $table->time("start");
            $table->time("end");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
