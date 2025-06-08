<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliderimage extends Model
{    
	protected $table="slider_images";
    protected $fillable=['title','image','is_delete','status','description'];
}
