<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class magazine extends Model
{
  protected $table = 'magazine';
  protected $primaryKey = 'magazine_id';

  protected $fillable = [
  'magazine_name',
  'magazine_image',
  'magazine_file',
  'magazine_flash',
  'magazine_state',
  'magazine_management_area',
  ];

  public $timestamps = false;
}
