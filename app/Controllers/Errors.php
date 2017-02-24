<?php namespace Controllers;

use Flight;

class Errors {

  public static function notFound() {
    Flight::render('errors/404', [], 'yield');
    Flight::render('layouts/menu', [], 'menu');
    Flight::render('layouts/layout', []);
  }

  public static function internalServerError() {
    Flight::render('errors/500', [], 'yield');
    Flight::render('layouts/menu', [], 'menu');
    Flight::render('layouts/layout', []);
  }

}
