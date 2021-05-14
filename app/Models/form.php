<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    protected $fillable = [
        'name','description','responsible_id','token',
    ];

    public function questions()
    {
        return $this->hasMany(question::class, 'form_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(order::class, 'form_id', 'id');
    }
}
