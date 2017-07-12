<?php namespace Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class User extends EloquentModel {

  protected $fillable = ['username', 'password'];
  protected $hidden = ['created_at', 'updated_at'];

}
