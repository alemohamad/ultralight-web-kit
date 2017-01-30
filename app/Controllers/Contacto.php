<?php namespace Controllers;

use Flight;

class Contacto {

  public static function index() {
    Flight::render('contact', ['twitter_account' => getenv('TWITTER')], 'yield');
    Flight::render('layouts/menu', ['base_url' => Flight::get('flight.base_url'), 'section_contact' => true], 'menu');
    Flight::render('layouts/layout', []);
  }

}
