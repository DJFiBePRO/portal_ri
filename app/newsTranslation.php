<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['news_translation_title', 'news_translation_content','news_translation_alias'];



    //Relacion uno a muchos (inversa)
    // public function news()
    // {
    //     return $this->belongsTo('App\continent');
    // }
}
