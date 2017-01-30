<?php namespace Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Message extends EloquentModel {

  protected $fillable = ['name', 'message'];
  protected $hidden = ['created_at', 'updated_at'];

}
