<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Subcategory extends Model
{
	use Sortable;
    protected $table="sub_category";
    protected $fillable=['parent_category','sub_category','is_delete','status'];
    public $sortable = ['id',
                        'parent_category',
                        'sub_category'
                        ];
}
