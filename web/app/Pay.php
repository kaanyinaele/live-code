<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
     protected $table="location";
    protected $fillable=['amount','user_id','payment_status','provider_id','transaction_key','card_number','cvv','mobile_no'];

}
