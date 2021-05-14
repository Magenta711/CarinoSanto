<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_question extends Model
{
    protected $fillable = [
        'question_id','num','type','option',
    ];
}
