<?php

if( !session_id() ) @session_start();

require_once 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Models\Database;
new Database();

WingCommander::init();
Flight::view()->setTemplatePath("./app/Views");

Flight::set('flight.base_url', getenv('BASE_URL'));

include_once('app/routes.php');

Flight::start();
