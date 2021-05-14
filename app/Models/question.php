<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'form_id','number','question','required','type','status'
    ];
    
    public function options()
    {
        return $this->hasMany(detail_question::class, 'question_id', 'id');
    }
}
