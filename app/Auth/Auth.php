<?php namespace Auth;

use Models\User;

class Auth {

  public function user() {
    if (getenv('DB_STATUS') != 'disabled') {
      return User::find($_SESSION['user_id']);
    }
    return new User();
  }

  public function check() {
    return isset($_SESSION['user_id']);
  }

  public function attempt($username, $password) {
    $user = null;
    if (getenv('DB_STATUS') != 'disabled') {
      $user = User::where('username', '=', $username)->first();
    }

    if (!$user) {
      return false;
    }

    if (password_verify($password, $user->password)) {
      $_SESSION['user_id'] = $user->id;
      return true;
    }

    return false;
  }

  public function logout() {
    unset($_SESSION['user_id']);
  }

}
