<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class PostScraper
{
  public static function init()
  {
    self::setEloquentModel();
    self::bindHelper();

    return 'Hurray! Code is running! Hurray! Code is running! Hurray! Code is running! ';
  }
  public static function setEloquentModel()
  {

    $capsule = new Capsule;

    $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => DB_HOST,
      'database'  => DB_NAME,
      'username'  => DB_USER,
      'password'  => DB_PASSWORD,
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]);

    // Setup the Eloquent ORM
    $capsule->bootEloquent();
  }

  public static function bindHelper()
  {
    if (file_exists(PIKU_PS_PLUGIN_PATH . '/src/app/Helpers/helper.php')) {
      // Load the autoloader.
      require PIKU_PS_PLUGIN_PATH . '/src/app/Helpers/helper.php';
    }
  }
}