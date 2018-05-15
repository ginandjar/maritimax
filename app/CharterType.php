<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharterType extends Model
{

  protected $hidden = ['created_at','updated_at','publish_status'];

  public function cargos()
  {
      return $this->hasMany('App\Cargo');

  }
}