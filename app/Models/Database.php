<?php namespace Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

  private $sqlite_datbase = __DIR__ . '/../../database.sqlite';

  function __construct() {
    if (getenv('DB_STATUS') == 'disabled') {
      return;
    }

    $capsule = new Capsule;
    $capsule->addConnection($this->getConfigDB());
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $this->createTableIfDoesntExist();
  }

  function getConfigDB() {
    $mysql_config = array(
      'host'      => getenv('DB_HOST'),
      'driver'    => 'mysql',
      'database'  => getenv('DB_DATABASE'),
      'username'  => getenv('DB_USER'),
      'password'  => getenv('DB_PASS'),
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => getenv('DB_PREFIX'),
    );

    $sqlite_config = array(
      'driver'   => 'sqlite',
      'database' => $this->sqlite_datbase,
      'prefix'   => '',
    );

    switch (getenv('DB_HOST')) {
      case 'host':
        if (!file_exists($this->sqlite_datbase)) {
          touch($this->sqlite_datbase);
        }
        return $sqlite_config;
      default:
        return $mysql_config;
    }
  }

  function createTableIfDoesntExist() {
    if (!Capsule::schema()->hasTable('messages')) {
      Capsule::schema()->create('messages', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->text('message');
        $table->timestamps();
      });
    }
  }

}
