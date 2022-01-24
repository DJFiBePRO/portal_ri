<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class culturalManagement extends Model
{
	protected $table = 'cultural_management';
	protected $primaryKey = 'cultural_management_id';

	protected $fillable = [

	'cultural_management_name',
	'cultural_management_description',
	'cultural_management_management_area',
	'cultural_management_state',
	'cultural_management_image',
	];

	const CREATED_AT = 'cultural_management_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'cultural_management_update';

    protected $date =[
    'cultural_management_create',
    'cultural_management_update',
    ];
}
