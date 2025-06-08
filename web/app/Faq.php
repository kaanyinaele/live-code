<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Faq extends Model
{   
	use Sortable;
	protected $table="faq";
    protected $fillable=['id','question','answer'];
    public $sortable = ['id',
                        'question',
                        'answer'
                        ];
}
