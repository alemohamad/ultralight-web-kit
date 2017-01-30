<?php

Flight::route('/', ['Controllers\Home', 'index']);
Flight::route('/hola/@name', ['Controllers\Hola', 'hola']);
Flight::route('/contacto', ['Controllers\Contacto', 'index']);

Flight::map('notFound', ['Controllers\Errors', 'notFound']);
Flight::map('error', ['Controllers\Errors', 'internalServerError']);
