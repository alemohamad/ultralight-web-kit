<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

define('DB_HOST', '127.0.0.1');
define('DB_PORT', 8889);
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'ultralight');
define('DB_PREFIX', 'ultralight_');

return [
  'paths' => [
    'migrations' => __DIR__ . '/app/Config/migrations',
    'seeds' => __DIR__ . '/app/Config/seeds'
  ],
  'environments' => [
    'default_migration_table' => 'migrations',
    'default_database' => 'development',
    'development' => [
      'adapter' => 'mysql',
      'host' => DB_HOST,
      'port' => DB_PORT,
      'name' => DB_NAME,
      'user' => DB_USER,
      'pass' => DB_PASS,
      'table_prefix' => DB_PREFIX
    ],
    'development_lite' => [
      'adapter' => 'sqlite',
      'name' => 'database.sqlite'
    ]
  ]
];
