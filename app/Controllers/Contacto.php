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

    $data = [
      'twitter_account' => getenv('TWITTER'),
      'name' => $name,
      'error_name' => $error_name,
      'message' => $message,
      'error_message' => $error_message,
      'section_contact' => true,
    ];

    Flight::view()->display('contact.twig', $data);
  }

  public static function thanks() {
    $data = [
      'twitter_account' => getenv('TWITTER'),
      'section_contact' => true
    ];

    Flight::view()->display('contact_thanks.twig', $data);
  }

}
