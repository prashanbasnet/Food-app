<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardDetail extends Model
{
    protected $fillable = [
        'name', 'number', 'exp_month', 'exp_year', 'cvc', 'user_id', 'reservation_id', 'order_id'
    ];
}
