<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FoodItems extends Model
{
    protected $table = 'foodItems';
    protected $primaryKey = 'foodItemsID';
    protected $guarded = ['foodItemsID'];





}
