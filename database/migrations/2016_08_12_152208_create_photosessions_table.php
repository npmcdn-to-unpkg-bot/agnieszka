<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photosessions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('title');
            $table->string('category');
            $table->string('background_image_path')->nullable();
            $table->string('background_image_path_thumbnail')->nullable();
            $table->date('date');
            $table->integer('photo_download_limit')->unsigned()->default(10);
            $table->boolean('notification_sent')->nullable()->default(false);
            $table->boolean('ordered')->default(false);
            $table->boolean('purchased')->default(false);
            $table->date('expiry_date');
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
        Schema::drop('photosessions');
    }
}
