<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countrys';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idContinent',
        'country',
    ];

    //Relacion uno a muchos (inversa)
    public function continent()
    {
        return $this->belongsTo('App\continent');
    }
    public function covenant()
    {
        return $this->belongsTo('App\covenant');
    }
    
}
