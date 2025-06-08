<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ServiceAcknowledgement extends Model
{  
   use sortable;
   protected $table='service_acknowledgements';

   protected $fillable=['service_booking_id','start_at_provider','end_at_provider','ack_start
   ','ack_end','service_status'];
}
