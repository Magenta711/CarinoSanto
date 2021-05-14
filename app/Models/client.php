<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'email','name','id_card','cel','address','apartment_or_house','city','neighborhood',
    ];
}
