<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeedbackToCourseLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('couse_lecture', function (Blueprint $table) {
            Schema::table('course_lecture', function (Blueprint $table) {
                $table->string('feedback')->after('is_preview')->nullable();
                $table->string('status')->after('is_preview')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('couse_lecture', function (Blueprint $table) {
            //
        });
    }
}
