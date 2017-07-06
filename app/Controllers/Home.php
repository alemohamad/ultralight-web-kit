<?php namespace Controllers;

use Flight;

class Home {

  public static function index() {
    $data = [
      'github_repo' => getenv('GITHUB'),
      'section_home' => true,
    ];

    Flight::view()->display('home.twig', $data);
  }

}
