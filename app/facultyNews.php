<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facultyNews extends Model
{
    protected $table = 'faculty_news';
	protected $primaryKey = 'faculty_news_id';

	protected $fillable = [
	'faculty_news_name',
	'faculty_news_description',
    'faculty_news_image',
	'faculty_news_state',
	'faculty_news_faculty',
	];

	const CREATED_AT = 'faculty_news_create';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'faculty_news_update';

    protected $date =[
    'faculty_news_create',
    'faculty_news_update',
    ];}
