<?php namespace Models;

class Message extends ImageModel {

  protected $fillable = ['name', 'message'];
  protected $hidden = ['created_at', 'updated_at'];

}
