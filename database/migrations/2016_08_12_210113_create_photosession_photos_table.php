<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosessionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photosession_photos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('photosession_id')->unsigned();
            $table->foreign('photosession_id')->references('id')->on('photosessions')->onDelete('cascade');

            $table->string('name');
            $table->string('path');
            $table->string('thumbnail_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photosession_photos');
    }
}
