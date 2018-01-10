<?php namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Eloquent {

  use SoftDeletes;

  // protected $table = '';
  // protected $dates = [];
  // protected $fillable = [];
  // protected $hidden = [];

  public function scopeActive($query) {
    return $query->where('active', true);
  }

}
