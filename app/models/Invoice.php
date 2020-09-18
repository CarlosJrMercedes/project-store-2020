<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }
}
