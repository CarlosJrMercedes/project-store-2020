<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function usuarios(){
        return $this->belongsTo(User::class,'user_id');
    }

}
