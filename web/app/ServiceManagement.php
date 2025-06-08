<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class ServiceManagement extends Model
{  
   use sortable;
   protected $table='service_managemenets';
   protected $fillable=['category_name','services_offered','image','service_overview','Availability','price','active_status','is_delete', 'featured_image' ,'featured_image'];
   public $sortable=['category_name','Availability','id'];

}
