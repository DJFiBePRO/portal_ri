<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    
	protected $table = 'category';
	protected $primaryKey = 'category_id';

	protected $fillable = [
	'category_description',
	'category_parent',
	'category_state',
	'category_management_area',
	];

	const CREATED_AT = 'category_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'category_update';

    protected $date =[
    'category_create',
    'category_update',
    ];
}
