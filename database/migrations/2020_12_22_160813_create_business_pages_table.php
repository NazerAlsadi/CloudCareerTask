<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('companyName');
            $table->string('alias');
            $table->string('country');
            $table->string('city');
            $table->string('region');
            $table->text('location');
            $table->string('industry');
            $table->string('logo');
            $table->text('description');
            $table->string('size');
            $table->text('params');
            $table->text('contact');
            $table->text('socialnetwork');
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
        Schema::dropIfExists('business_pages');
    }
}
