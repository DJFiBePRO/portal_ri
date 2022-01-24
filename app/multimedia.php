<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multimedia extends Model
{
	protected $table = 'multimedia';
	protected $primaryKey = 'multimedia_id';

	protected $fillable = [
	'multimedia_name',
	'multimedia_url',
	'multimedia_news',
	'multimedia_gallery',
	'multimedia_cultural_management_types',
	'multimedia_type',
	];

	const CREATED_AT = 'multimedia_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'multimedia_update';
}
