<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->unsigned();
            $table->string('degree');
            $table->string('school_name');
            $table->integer('school_id');
            $table->string('country');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('field_of_study');
            $table->text('summary');
            $table->text('activities');
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
        Schema::dropIfExists('education');
    }
}
