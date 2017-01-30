<?php

Flight::route('/', ['Controllers\Home', 'index']);
Flight::route('/hola/@name', ['Controllers\Hola', 'hola']);
Flight::route('POST /contacto', ['Controllers\SendMails', 'contact']);
Flight::route('/contacto', ['Controllers\Contacto', 'index']);
Flight::route('/contacto/gracias', ['Controllers\Contacto', 'thanks']);

Flight::map('notFound', ['Controllers\Errors', 'notFound']);
Flight::map('error', ['Controllers\Errors', 'internalServerError']);
