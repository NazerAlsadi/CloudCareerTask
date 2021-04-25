<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
    
            $table->integer('job_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->integer('cv_id')->unsigned();
            $table->string('email');
            $table->string('phone');
            $table->date('apply_date');
            $table->integer('evaluation');
            $table->integer('reviewed_by');
            $table->text('note');
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
        Schema::dropIfExists('applications');
    }
}
