<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class managementArea extends Model
{
    protected $table = 'management_area';
	protected $primaryKey = 'management_area_id';

	protected $fillable = [

	'management_area_name',
	'management_area_logo',
	'management_area_image',
    'management_area_create',
    'management_area_mission',
    'management_area_vision',
    'management_area_objective',
    'management_area_phone',
    'management_area_map',
    'management_area_description',
    'management_area_mail',
    'management_area_direction',
    'management_area_image_mission',
    'management_area_image_vision',
    'management_area_create',

	];

	const CREATED_AT = 'management_area_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'management_area_update';

    protected $date =[
    'management_area_create',
    'management_area_update',
    ];
   
}
        