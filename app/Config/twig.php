<?php

//
// Initiate Twig, and register to Flight
//

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../Views'); 
$twigConfig = [
  // 'cache'	=>	'./cache/twig/',
  // 'cache'	=>	false,
  'debug'	=>	true,
];

Flight::register('view', 'Twig_Environment', [$loader, $twigConfig], function($twig) {
  $twig->addExtension(new Twig_Extension_Debug());
});
