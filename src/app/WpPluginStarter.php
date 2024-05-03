<?php

namespace App;

use App\Supports\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Services\Services;
use App\Supports\Notices;


class WpPluginStarter
{
  /**
   * Instance property of wp_plugin_starter Class.
   * This is a property in your plugin primary class. You will use to create
   * one object from wp_plugin_starter class in whole of program execution.
   *
   * @access private
   * @var    WpPluginStarter $instance create only one instance from plugin primary class
   * @static
   */
  private static $instance;

  public function __construct()
  {
    $this->setEloquentModel();
    /**
     * Register activation hook.
     * Register activation hook for this plugin by invoking activate
     * in wp_plugin_starter class.
     *
     * @param string   $file     path to the plugin file.
     * @param callback $function The function to be run when the plugin is activated.
     */
    register_activation_hook(
      PIKU_WPS_PLUGIN_FILE,
      array($this, 'activate')
    );
    /**
     * Register deactivation hook.
     * Register deactivation hook for this plugin by invoking deactivate
     * in wp_plugin_starter class.
     *
     * @param string   $file     path to the plugin file.
     * @param callback $function The function to be run when the plugin is deactivated.
     */
    register_deactivation_hook(
      PIKU_WPS_PLUGIN_FILE,
      array($this, 'deactivate')
    );

    $this->run(new Services);

    return 'Hurray! Code is running! Hurray! Code is running! Hurray! Code is running! ';
  }
  /**
   * Create an instance from wp_plugin_starter class.
   *
   * @access public
   * @since  1.0.0
   * @return wp_plugin_starter
   */
  public static function init()
  {
    if (is_null((self::$instance))) {
      self::$instance = new self();
    }

    return self::$instance;
  }
  public function setEloquentModel()
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
    // $DBconfig = Config::get('database');
    // dd($DBconfig);
    // $capsule->addConnection($DBconfig);

    // Setup the Eloquent ORM
    $capsule->bootEloquent();
  }

  public function activate()
  {
    // dump('activated');
    $message = 'Wp Starter pack is Activated';
    Notices::display_notice($message, 'success');
  }
  public function deactivate()
  {
    // dump('deactivated');
    $message = 'Wp Starter pack is De-Activated';
    Notices::display_notice($message, 'warning');
  }
  public function run(Services $services)
  {
    $message = 'Wp Starter pack is Running';
    Notices::display_notice($message, 'success');
    $services->loadScripts();
    // dd(\App\Models\Product::all());
  }
}
