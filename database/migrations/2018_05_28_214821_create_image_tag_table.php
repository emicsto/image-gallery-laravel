<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_tag', function (Blueprint $table) {
            $table->unsignedInteger('image_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');;
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');;

            $table->primary(['image_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_tag');
    }
}
