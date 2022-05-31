<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_content', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_lecture_id')->unsigned();
            $table->string('resource_file')->nullable();
            $table->text('resource_link')->nullable();
            $table->timestamps();

            $table->foreign('course_lecture_id')->references('id')->on('course_lecture')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_content');
    }
}
