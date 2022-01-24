<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Reacion de uno a muchos
    public function news(){
        return $this->hasMany('App\news');
    }


}
