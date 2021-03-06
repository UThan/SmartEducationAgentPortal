<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $attributes = [
        'type' => 'Deposit',
        'currency' => 'MMK',
    ];  
    
    public function students(){
        return $this->belongsTo(Student::class);
    }
}
