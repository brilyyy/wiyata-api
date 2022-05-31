<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ref_categories_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('ref_categories_id')->references('id')->on('ref_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_sub_categories');
    }
}
