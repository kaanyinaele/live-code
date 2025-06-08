<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Blog extends Model
{
    use sortable;
    protected $table="blog";
    protected $fillable=['title','description','status','is_delete','image','featured_image','created_at'];
    public $sortable=['title','created_at'];
}
