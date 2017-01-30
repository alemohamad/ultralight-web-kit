<?php namespace Controllers;

use Flight;
use Joelvardy\Flash;

class Contacto {

  public static function index() {
    $flash = Flash::data();
    $name = isset($flash['name']) ? $flash['name'] : "";
    $error_name = isset($flash['errors']['name']) ? $flash['errors']['name'][0] : "";
    $message = isset($flash['message']) ? $flash['message'] : "";
    $error_message = isset($flash['errors']['message']) ? $flash['errors']['message'][0] : "";

    Flight::render('contact', ['twitter_account' => getenv('TWITTER'), 'name' => $name, 'error_name' => $error_name, 'message' => $message, 'error_message' => $error_message], 'yield');
    Flight::render('layouts/menu', ['base_url' => Flight::get('flight.base_url'), 'section_contact' => true], 'menu');
    Flight::render('layouts/layout', []);
  }

  public static function thanks() {
    Flight::render('contact_thanks', ['twitter_account' => getenv('TWITTER')], 'yield');
    Flight::render('layouts/menu', ['base_url' => Flight::get('flight.base_url'), 'section_contact' => true], 'menu');
    Flight::render('layouts/layout', []);
  }

}
