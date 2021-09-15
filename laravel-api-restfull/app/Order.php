<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderRelationToCustomer()
    {
         return $this->hasOne('App\Customer','id', 'customer_id');
    }
}
