<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model implements TranslatableContract
{
	use HasFactory;
	use Translatable;

    public $timestamps = true;

    protected $guarded = ['news_id'];
	public $translatedAttributes = ['news_translation_title', 'news_translation_content','news_translation_alias'];

	//Relacion de uno a muchos
	// public function newsTranslations()
    // {
    //     return $this->hasMany('App\newsTranslation');
    // }

    //Relacion uno a muchos (inversa)
    public function newsTypes(){
        return $this->belongsTo('App\newsType');
    }
	public function newsStatus(){
        return $this->belongsTo('App\newsStatus');
    }
	
	// protected $table = 'news';
	// protected $primaryKey = 'news_id';

	// protected $fillable = [
	// 'news_title',
	// 'news_content',
	// 'news_state',
	// 'news_author',
	// 'news_alias',
	// 'news_create',
	// 'news_type',
	// 'news_management_area',
	// 'news_user',
	// ];

	// const CREATED_AT = 'news_create';

    // /**
    //  * The name of the "updated at" column.
    //  *
    //  * @var string
    //  */
    // const UPDATED_AT = 'news_update';

    // protected $date =[
    // 'news_create',
    // 'news_update',
    // ];

}
