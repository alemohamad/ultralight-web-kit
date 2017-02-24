<?php namespace Controllers;

use Flight;

class Home {

  public static function index() {
    Flight::render('home', ['github_repo' => getenv('GITHUB')], 'yield');
    Flight::render('layouts/menu', ['section_home' => true], 'menu');
    Flight::render('layouts/layout', []);
  }

}
