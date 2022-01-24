<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    protected $table = 'link';
	protected $primaryKey = 'link_id';

	protected $fillable = [
	'link_name',
	'link_description',
	'link_url',
	'link_state',
	'link_category',
	'link_management_area',
	];

	const CREATED_AT = 'link_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'link_update';

    protected $date =[
    'link_create',
    'link_update',
    ];
}
