<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->unsigned();
            $table->string('title');
            $table->text('summary');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current');
            $table->string('country');
            $table->string('city');
            $table->text('company_name');
            $table->integer('company_id');
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
        Schema::dropIfExists('positions');
    }
}
