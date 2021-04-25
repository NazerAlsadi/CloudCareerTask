<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
    
    use SoftDeletes,HasFactory;

    public function user(){
    	
        return $this->belongsTo(User::class);
    }

    public function applications (){

        return $this->belongsToMany(Profile::class, 'applications' , 'job_id' , 'profile_id')->withPivot('id', 'job_id', 'profile_id', 'cv_id', 'email', 'phone', 'apply_at', '
        	evaluation', 'reviewed_by', 'note'); 
    }

    public function businessPages(){
    	return $this->belongsTo(BusinessPage::class);
    }
    
}
