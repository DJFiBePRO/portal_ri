<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
	protected $table = 'user';
	protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_name',
    	'user_last_name',
    	'user_mail' ,
    	'user_photo' ,
    	'user_create' ,
    	'user_update' ,
    	'remember_token' ,
    	'password',
    	'user_phone' ,
    	'user_type' ,
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 
    'remember_token',
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}