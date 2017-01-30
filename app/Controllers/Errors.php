<?php namespace Controllers;

use Flight;

class Errors {

  public static function notFound() {
    Flight::render('errors/404', [], 'yield');
    Flight::render('layouts/menu', ['base_url' => Flight::get('flight.base_url')], 'menu');
    Flight::render('layouts/layout', []);
  }

  public static function internalServerError() {
    Flight::render('errors/500', [], 'yield');
    Flight::render('layouts/menu', ['base_url' => Flight::get('flight.base_url')], 'menu');
    Flight::render('layouts/layout', []);
  }

}
