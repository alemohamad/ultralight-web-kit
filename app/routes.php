<?php

// Master Panel - Login
Flight::route('/master', ['Controllers\Master\Login', 'index']);
Flight::route('GET /master/login', ['Controllers\Master\Login', 'login']);
Flight::route('POST /master/login', ['Controllers\Master\Login', 'loginCheck']);
Flight::route('/master/logout', ['Controllers\Master\Login', 'logout']);

// Master Panel - Messages
Flight::route('GET /master/messages', ['Controllers\Master\Messages', 'listItems']);
Flight::route('POST /master/messages', ['Controllers\Master\Messages', 'itemUpdate']);
Flight::route('GET /master/messages/new', ['Controllers\Master\Messages', 'itemNew']);
Flight::route('POST /master/messages/new', ['Controllers\Master\Messages', 'itemCreate']);
Flight::route('/master/messages/@id/toggle', ['Controllers\Master\Messages', 'itemToggle']);
Flight::route('/master/messages/@id/remove', ['Controllers\Master\Messages', 'itemRemove']);
Flight::route('/master/messages/@id', ['Controllers\Master\Messages', 'itemEdit']);

// Website - Front
Flight::route('/', ['Controllers\Home', 'index']);
Flight::route('/hola/@name', ['Controllers\Hola', 'hola']);
Flight::route('GET /contacto', ['Controllers\Contacto', 'index']);
Flight::route('POST /contacto', ['Controllers\SendMails', 'contact']);
Flight::route('/contacto/gracias', ['Controllers\Contacto', 'thanks']);

// 404 view
Flight::map('notFound', ['Controllers\Errors', 'notFound']);

// 500 view
if (getenv('DEBUG') == 0) {
  Flight::map('error', ['Controllers\Errors', 'internalServerError']);
}
