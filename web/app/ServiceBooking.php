<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class ServiceBooking extends Model
{   

    use sortable;
    protected $table="service_booking";
    protected $fillable=['id','time','date','address','additional_information','payment_type','user_id','image','service_id','created_at','status','price','extra_information','sub_category','mobile_no','whatsapp_no','rating_status'];
     public $sortable=['id','time','date','address','additional_information','payment_type','created_at','price','updated_at','sub_category'];
}
