<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Restaurant extends Model
{
    protected $table = 'restaurant';
    protected $primaryKey = 'restaurantID';
    protected $guarded = ['restaurantID'];





}
