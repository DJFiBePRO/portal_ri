<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $table = 'projects';
	protected $primaryKey = 'projects_id';

	protected $fillable = [
	'projects_name',
	'projects_description',
	'projects_state',
	'projects_management_area',
	];

	const CREATED_AT = 'projects_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'projects_update';

    protected $date =[
    'projects_create',
    'projects_update',
    ];}
