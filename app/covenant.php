<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class covenant extends Model
{
    protected $table = 'covenants';
    protected $primaryKey = 'id';

    protected $fillable = [
        'caracter',
        'university',
        'idCountry',
        'resolution',
        'is_validity',
    ];

    //Relacion uno a muchos
    public function countrys()
    {
        return $this->hasMany('App\country');
    }
}
