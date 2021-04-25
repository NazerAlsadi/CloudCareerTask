<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function positions(){

    	return $this->hasMany(Position::class);
    }

    public function educations(){

    	return $this->hasMany(Education::class);
    }

    public function skills(){

    	return $this->hasMany(Skill::class);
    }

    public function courses(){

    	return $this->hasMany(Course::class);
    }

    public function certificates(){

    	return $this->hasMany(Certificate::class);
    }

    public function languages(){

    	return $this->hasMany(Language::class);
    }

    public function cvs(){

    	return $this->hasMany(CV::class);
    }
////////////////////////////////////////////////

    public function applications (){

        return $this->belongsToMany(JobPost::class, 'applications' , 'job_id' , 'profile_id')->withPivot('id', 'job_id', 'profile_id', 'cv_id', 'email', 'phone', 'apply_at', 'evaluation', 'reviewed_by', 'note'); 
    }

    public function businesspage (){

        return $this->belongsToMany(BusinessPage::class,'business_profile'); 
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJobs::class);
    }

}
