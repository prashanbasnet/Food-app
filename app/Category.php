<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'categoryID';
    protected $guarded = ['categoryID'];





}
