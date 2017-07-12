<?php

// global variables for the views
Flight::view()->addGlobal('base_url', getBaseUrl());

Flight::view()->addGlobal('auth', [
  'check' => Flight::auth()->check(),
  'user' => Flight::auth()->user(),
]);
