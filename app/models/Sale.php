<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id')->withTrashed();
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id')->withTrashed();
    }
}
