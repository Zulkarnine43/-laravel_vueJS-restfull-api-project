<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'product_name', 'category_id','product_short_description','product_long_description','product_price','publication_status','created_at'];


    function realtionToCategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}

