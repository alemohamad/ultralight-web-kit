<?php

return [
  'paths' => [
    'migrations' => __DIR__ . '/app/Config/migrations'
  ],
  'environments' => [
    'default_migration_table' => 'phinxlog',
    'default_database' => 'development',
    'development' => [
      'adapter' => 'mysql',
      'host' => 'host',
      'name' => 'database',
      'user' => 'user',
      'pass' => 'pass',
      'port' => 3306
    ],
    'development_lite' => [
      'adapter' => 'sqlite',
      'name' => 'database.sqlite'
    ]
  ]
];
