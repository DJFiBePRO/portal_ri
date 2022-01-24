<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multimediaType extends Model
{
	protected $table = 'multimedia_type';
	protected $primaryKey = 'multimedia_type_id';

	protected $fillable =[
	'multimedia_type_description',
	];
	public $timestamps = false;

}
