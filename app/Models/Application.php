<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function profile(){
    	
        return $this->belongsTo(Profile::class);
    }

    public function cv(){
    	
        return $this->belongsTo(CV::class);
    }
}
