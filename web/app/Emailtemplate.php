<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailtemplate extends Model
{
    protected $table="email_templates";
  protected $fillable =['title','slug','subject','status','message','is_delete'];
}
