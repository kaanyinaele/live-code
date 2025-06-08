<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table="rating";
    protected $fillable=['provider_id','servicebooking_id','user_id','rating','review','service_id'];
}
