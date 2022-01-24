<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class continent extends Model
{
    protected $table = 'continents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'continent',
    ];

    public function countrys()
    {
        return $this->hasMany('App\country');
    }
}
