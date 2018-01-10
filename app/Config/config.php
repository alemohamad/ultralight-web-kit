<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

(new Dotenv\Dotenv(__DIR__ . '/../../'))->load();

new Config\Database();

if (getenv('DEBUG') == 1) {
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}

include_once('twig.php');
include_once('auth.php');

include_once('globals.php');
