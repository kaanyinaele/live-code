<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Contactus extends Model
{  
	use sortable;
   protected $table='enquiry';
   protected $fillable=['name','email','message','reply'];
   public $sortable=['name','email','created_at','id'];
}
