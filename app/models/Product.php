<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'id_sub_category');
    }
    //
}
