<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class download extends Model
{
	protected $table = 'download';
	protected $primaryKey = 'download_id';

	protected $fillable = [
	'download_name',
	'download_description',
	'download_file',
	'download_state',
	'download_management_area',
	];

	const CREATED_AT = 'download_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'download_update';

    protected $date =[
    'download_create',
    'download_update',
    ];

}
