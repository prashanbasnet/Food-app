<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id', 'subtotal', 'total_items', 'items', 'note', 'order_status', 'order_sidenote', 'user_id'
    ];
}
