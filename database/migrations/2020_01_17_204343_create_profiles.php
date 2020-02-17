<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('description')->nullable();
            $table->string('url')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('rating')->default(0);
            $table->string('whatsapp')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('image')->nullable();
            $table->longText('text')->nullable();
            $table->string('category_id')->nullable();
            $table->string('age')->nullable();
            $table->string('bday')->nullable();
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
