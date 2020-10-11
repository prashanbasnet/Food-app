<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $primaryKey = 'reservationID';
    protected $guarded = ['reservationID'];





}
