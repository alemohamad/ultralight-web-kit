<?php namespace Controllers;

use Flight;

class Hola {

  public static function hola($name) {
    Flight::render('hello', ['planet' => $name], 'yield');
    Flight::render('layouts/menu', ['section_hello' => true], 'menu');
    Flight::render('layouts/layout', []);
  }

}
