<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conventions extends Model
{
    protected $table = 'conventions';
	protected $primaryKey = 'conventions_id';

	protected $fillable = [
	'conventions_name',
	'conventions_type',
	'conventions_file',
	'conventions_state',
	'conventions_management_area',
	];

	const CREATED_AT = 'conventions_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'conventions_update';

    protected $date =[
    'conventions_create',
    'conventions_update',
    ];}
