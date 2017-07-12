<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

(new Dotenv\Dotenv(__DIR__ . '/../../'))->load();

new Config\Database();

include_once('twig.php');
include_once('auth.php');

include_once('globals.php');
