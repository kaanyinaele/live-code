<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPrice extends Model
{
   protected $table="booking_price";
    protected $fillable=['id','calculate_price','cost','quantity','booking_id','service_name','vat','discount'];
}
