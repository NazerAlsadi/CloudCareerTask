<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('alias');
            $table->text('headline');
            $table->text('location');
            $table->string('country');
            $table->string('city');
            $table->string('region');
            $table->string('street');
            $table->text('full_address');
            $table->string('nationality');
            $table->integer('category');
            $table->text('summary');
            $table->text('specialties');
            $table->string('pic');
            $table->string('cover');
            $table->text('contact');
            $table->softDeletes();
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
