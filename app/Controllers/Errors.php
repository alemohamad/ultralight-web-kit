<?php namespace Controllers;

use Flight;

class Errors {

  public static function notFound() {
    Flight::view()->display('errors/404.twig', []);
  }

  public static function internalServerError() {
    Flight::view()->display('errors/500.twig', []);
  }

}
