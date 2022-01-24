<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    protected $table = 'faculty';
	protected $primaryKey = 'faculty_id';

	protected $fillable = [
	'faculty_name',
	'faculty_image',
	'faculty_state',
	'faculty_management_area',
	];

	const CREATED_AT = 'faculty_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'faculty_update';

    protected $date =[
    'faculty_create',
    'faculty_update',
    ];
}
