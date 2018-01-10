<?php namespace Controllers\Master;

use Flight;
use Models\Message;
use Joelvardy\Flash;

define('CLASS_REDIRECT_ROUTE', '/master/messages');

class Messages {

  public static function listItems() {
    Login::checkStatus();

    $messages = Message::all();

    $flash = Flash::data();
    $flash_message = isset($flash['flash_message']) ? $flash['flash_message'] : "";

    $data = [
      'messages' => $messages,
      'flash_message' => $flash_message,
    ];
    Flight::view()->display('master/messages/listItems.twig', $data);
  }

  public static function itemNew() {
    Login::checkStatus();

    $message = new Message;

    $data = [
      'message' => $message,
      'form_url' => 'messages/new',
    ];
    Flight::view()->display('master/messages/itemEdit.twig', $data);
  }

  public static function itemCreate() {
    Login::checkStatus();

    $message = new Message;

    $message->name = Flight::request()->data->name;
    $message->message = Flight::request()->data->message;

    $message->image = $message->processFile('image', Flight::request()->files->image, ['width' => 1200, 'height' => 550]);

    $message->save();

    Flash::data(['flash_message' => "El mensaje {$message->name} fue creado."]);
    Flight::redirect(CLASS_REDIRECT_ROUTE);
  }

  public static function itemEdit($id) {
    Login::checkStatus();

    $message = Message::find($id);

    $data = [
      'message' => $message,
      'form_url' => 'messages',
    ];
    Flight::view()->display('master/messages/itemEdit.twig', $data);
  }

  public static function itemUpdate() {
    Login::checkStatus();

    $id = Flight::request()->data->id;

    $message = Message::find($id);

    $message->name = Flight::request()->data->name;
    $message->message = Flight::request()->data->message;

    $message->image = $message->processFile('image', Flight::request()->files->image, ['width' => 1200, 'height' => 550]);

    $message->save();

    Flash::data(['flash_message' => "El mensaje {$message->name} fue modificado."]);
    Flight::redirect(CLASS_REDIRECT_ROUTE);
  }

  public static function itemToggle($id) {
    $message = Message::find($id);

    if ($message) {
      $message->active = !$message->active;
      $message->save();
    }

    Flight::redirect(CLASS_REDIRECT_ROUTE);
  }

  public static function itemRemove($id) {
    $message = Message::find($id);

    if ($message) {
      $message->delete();
    }

    Flash::data(['flash_message' => "El mensaje {$message->name} fue eliminado."]);
    Flight::redirect(CLASS_REDIRECT_ROUTE);
  }

}
