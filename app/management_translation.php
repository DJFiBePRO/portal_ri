<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class management_translation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'management_translations';
    protected $fillable = ['mission_translation', 'vission_translation', 'objective_translation', 'function_translation', 'about_translation'];
    // protected $hidden = [
    //     'id_u',
    //     'id_ut',
    //     'locale',
    // ];
}
