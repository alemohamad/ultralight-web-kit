<?php

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
      'host' => 'host',
      'port' => 3306,
      'name' => 'database',
      'user' => 'user',
      'pass' => 'pass',
      'table_prefix' => 'amigos_'
    ],
    'development_lite' => [
      'adapter' => 'sqlite',
      'name' => 'database.sqlite'
    ]
  ]
];
