<?php

(new Dotenv\Dotenv(__DIR__ . '/../../'))->load();

new Config\Database();

include_once('twig.php');

include_once('globals.php');
