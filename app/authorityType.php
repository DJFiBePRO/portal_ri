<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authorityType extends Model
{
	protected $table = 'authority_type';
	protected $primaryKey = 'authority_type_id';

	protected $fillable = [
	'authority_type_description',
	];

	public $timestamps = false;

}
