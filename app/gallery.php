<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
	protected $table = 'gallery';
	protected $primaryKey = 'gallery_id';

	protected $fillable = [

	'gallery_name',
	'gallery_description',
	'gallery_management_area',
    'gallery_state',
	];

	const CREATED_AT = 'gallery_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'gallery_update';

    protected $date =[
    'gallery_create',
    'gallery_update',
    ];
}
