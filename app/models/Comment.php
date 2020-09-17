<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function respuestas()
    {
        return $this->hasMany(RespComment::class,'commentary_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }

}
