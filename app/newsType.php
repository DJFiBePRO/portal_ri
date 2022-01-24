<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class newsType extends Model
{
	use HasFactory;

	public $timestamps = false;

	//Reacion de uno a muchos
    public function news(){
        return $this->hasMany('App\news');
    }


	/*protected $table = 'news_types';
	protected $primaryKey = 'news_type_id';

	protected $fillable = [
	'news_type_description',
	];
	public $timestamps = false;*/

}
