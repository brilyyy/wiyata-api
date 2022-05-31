<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lecture', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_section_id')->unsigned();
            $table->text('lecture_name');
            $table->longText('description')->nullable();
            $table->text('video')->nullable();
            $table->string('duration')->nullable();
            $table->boolean('is_preview')->nullable();
            $table->timestamps();

            $table->foreign('course_section_id')->references('id')->on('course_section')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lecture');
    }
}
