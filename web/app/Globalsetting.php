<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Globalsetting extends Model
{  
	protected $table='global_setting';
   protected $fillable=['phone_no','address','contact_person_name','email','instagram','facebook','twitter','pinterest','title','content','logo','copyright','favicon','vat'];
}
