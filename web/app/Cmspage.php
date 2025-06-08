<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmspage extends Model
{
    protected $table="cms_pages";
    protected $fillable=['title','description','slug','our_mission'];

}
