<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Location extends Model
{
	use sortable;
    protected $table="location";
    protected $fillable=['name','is_delete','status'];
    public $sortable=['name','created_at'];
}
