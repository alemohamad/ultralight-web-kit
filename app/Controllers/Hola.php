<?php namespace Controllers;

use Flight;

class Hola {

  public static function hola($name) {
    $data = [
      'planet' => $name,
      'section_hello' => true,
    ];

    Flight::view()->display('hello.twig', $data);
  }

}
