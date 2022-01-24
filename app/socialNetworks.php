<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socialNetworks extends Model
{
	protected $table = 'social_network';
	protected $primaryKey = 'social_network_id';

	protected $fillable = [
	'social_network_name',
	'social_network_url',
	'social_network_image',
	'social_network_state',
	'social_network_management_area',
	];

	const CREATED_AT = 'social_network_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'social_network_update';

    protected $date =[
    'social_network_create',
    'social_network_update',
    ];

}
