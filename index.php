<?php

require_once 'vendor/autoload.php';

WingCommander::init();

Flight::set('flight.base_url', 'http://localhost:1234/');

Flight::route('/', function() {
    Flight::render('home', array(), 'yield');
    Flight::render('menu', array('base_url' => Flight::get('flight.base_url'), 'section_home' => true), 'menu');
    Flight::render('layout', array());
});

Flight::route('/hola/@name', function($name) {
    Flight::render('hello', array('planet' => $name), 'yield');
    Flight::render('menu', array('base_url' => Flight::get('flight.base_url'), 'section_hello' => true), 'menu');
    Flight::render('layout', array());
});

Flight::route('/contacto', function() {
    Flight::render('contact', array(), 'yield');
    Flight::render('menu', array('base_url' => Flight::get('flight.base_url'), 'section_contact' => true), 'menu');
    Flight::render('layout', array());
});

Flight::map('notFound', function() {
    echo '404: No encontrado';
});

Flight::map('error', function(Exception $ex){
    echo '500: Hubo un error!';
});

Flight::start();
