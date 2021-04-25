<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->integer('businessPage_id')->unsigned();
            $table->string('businessPageName');

            
            $table->string('job_location');
            $table->string('country');
            $table->string('city');
            $table->string('region');
            

            $table->string('job_title');
            $table->string('job_department');
            $table->string('job_Role');
            $table->text('skills');
            $table->text('education');
            $table->integer('experience_min');
            $table->integer('experience_max');


            $table->text('job_description')->nullable();
            $table->integer('published')->nullable();
            $table->integer('reviewed_by')->nullable();
            $table->date('published_at')->nullable();
            $table->date('publish_end')->nullable();
            
            $table->integer('visible')->nullable();   
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
        Schema::dropIfExists('job_posts');
    }
}
