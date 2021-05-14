<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer','question_id','order_id'
    ];
    
    public function question()
    {
        return $this->hasOne(question::class, 'id', 'question_id');
    }

    public function order()
    {
        return $this->hasOne(order::class, 'id', 'order_id');
    }
    
}
