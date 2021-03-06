<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function partners(){
        return $this->belongsToMany(Partner::class,'offered_courses');
    }
}

