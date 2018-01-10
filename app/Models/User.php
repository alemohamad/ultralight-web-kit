<?php namespace Models;

class User extends BaseModel {

  protected $fillable = ['username', 'password'];
  protected $hidden = ['created_at', 'updated_at'];

  public function setPasswordAttribute($value) {
    $options = ['cost' => 12];
    $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT, $options);
  }

}
