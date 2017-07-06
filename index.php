<?php

if ( !session_id() ) @session_start();

require_once 'vendor/autoload.php';

include_once('app/Config/config.php');

include_once('app/routes.php');

Flight::start();
