<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashFolow extends Model
{
    protected $table = "cashfolow";
    public $timestamps = true;


    public function product() {
        return $this->hasMany('App\Models\Product','id','product_id');
    }
}
