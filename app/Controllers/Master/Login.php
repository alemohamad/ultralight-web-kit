<?php namespace Controllers\Master;

use Flight;
use Joelvardy\Flash;

class Login {

  public static function checkStatus() {
    if (!Flight::auth()->check()) {
      Flight::redirect('/master/login');
    }
  }

  public static function index() {
    Flight::redirect('/master/messages');
  }

  public static function login() {
    if (Flight::auth()->check()) {
      Flight::redirect('/master');
    }

    $flash = Flash::data();
    $error = isset($flash['error']) ? $flash['error'] : '';

    $data = ['error' => $error];
    Flight::view()->display('master/login.twig', $data);
  }

  public static function loginCheck() {
    $username = Flight::request()->data->username;
    $password = Flight::request()->data->password;

    if ( !Flight::auth()->attempt($username, $password) ) {
      if ( !empty($username) ) {
        Flash::data(['error' => "El usuario {$username} no existe o la contraseña no es válida."]);
      }
      Flight::redirect('/master/login');
    }

    Flight::redirect('/master');
  }

  public static function logout() {
    Flight::auth()->logout();

    Flight::redirect('/master');
  }

}
