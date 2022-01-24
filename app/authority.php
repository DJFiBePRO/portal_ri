<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authority extends Model
{
    protected $table = 'authority';
	protected $primaryKey = 'authority_id';

	protected $fillable = [

	'authority_name',
	'authority_last_name',
	'authority_cv',
	'authority_management_area',
	'authority_type',
	'authority_photo',
	];

	const CREATED_AT = 'authority_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'authority_update';

    protected $date =[
    'authority_create',
    'authority_update',
    ];
}
