<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    protected $table = 'user_type';
	protected $primaryKey = 'user_type_id';

	protected $fillable = [
	'user_type_description',
	];

	public $timestamps = false;
}

