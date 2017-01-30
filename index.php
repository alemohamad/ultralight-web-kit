<?php

require_once 'vendor/autoload.php';

Flight::route('/', function() {
    echo 'Tenemos nuestra página web!';
});

Flight::route('/hola-mundo', function() {
    echo 'Hola mundo!';
});

Flight::map('notFound', function() {
    echo '404: No encontrado';
});

Flight::map('error', function(Exception $ex){
    echo '500: Hubo un error!';
});

Flight::start();
