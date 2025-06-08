<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Notification extends Model
{  
   use sortable;
   protected $table='notifications';

   protected $fillable=[ 'type', 'user_id', 'title', 'message', 'is_read', 'is_delete', 'data'];
}
