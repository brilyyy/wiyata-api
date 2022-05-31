<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ref_sub_categories_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('price_id')->unsigned()->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('total_ratings')->nullable();
            $table->string('status')->nullable();
            $table->string('requirement')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('certificate')->nullable();
            $table->timestamps();

            $table->foreign('ref_sub_categories_id')->references('id')->on('ref_sub_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('price_id')->references('id')->on('price')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
