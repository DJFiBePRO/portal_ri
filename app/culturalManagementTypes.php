<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class culturalManagementTypes extends Model
{
	protected $table = 'cultural_management_types';
	protected $primaryKey = 'cultural_management_types_id';

	protected $fillable = [

	'cultural_management_types_name',
	'cultural_management_types_description',
	'cultural_management_types_area',
	'cultural_management_types_state',
	];

	const CREATED_AT = 'cultural_management_types_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'cultural_management_types_update';

    protected $date =[
    'cultural_management_types_create',
    'cultural_management_types_update',
    ];
}
