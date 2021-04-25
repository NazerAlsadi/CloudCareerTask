<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPage extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function jobpost()
    {
        return $this->hasMany(JobPost::class);
    }


    public function profiles(){    
        return $this->belongsToMany(Profile::class,'business_profiles'); 
    }
}
