<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = [
        'message','method','url','user_id','ip','code'
    ];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
