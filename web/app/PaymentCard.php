<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{	
	protected $table="payment_card";
    protected $fillable=['card_number','expiry_month','expiry_year','cvv','defalut_card','user_id','cardholder_name'];
}
