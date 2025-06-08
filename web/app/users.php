<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;


class users extends Authenticatable
{  
    use Sortable;
    use Notifiable;
    protected $table = 'users';
    protected $fillable = ['name','email','password','phone_no','address','image','gender','zip_code','notification_token', 'account_activate','role','created_at','city','document','skill_category', 'status', 'is_delete','provider_profile','overview','facebook_id','provider_id','twitter_id','provider','is_approved','google_id','entity_type','street','area'];      

    public $sortable = ['id',
                        'name',
                        'email',
                        'created_at',
                        ];

    // public function addNew($input)
    // {
    //     $check = static::where('facebook_id',$input['facebook_id'])->first();
    //     if(is_null($check)){
    //         return static::create($input);
    //     }
    //     return $check;
    // }                    
   
}