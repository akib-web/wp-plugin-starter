<?php

namespace App\Supports;

defined('ABSPATH') || exit;

class Config
{

  protected static $filePath = 'src/configs/';
  protected static $config = [];

  protected static function loadConfig()
  {
    $configPath = get_plugin_root_path() . self::$filePath;
    $configFiles = glob($configPath . '*.php');

    foreach ($configFiles as $file) {
      $configName = basename($file, '.php');
      self::$config[$configName] = include $file;
    }
  }

  public static function get($key, $default = null)
  {
    self::loadConfig();
    $keys = explode('.', $key);
    $config = self::$config;

    foreach ($keys as $key) {
      if (isset($config[$key])) {
        $config = $config[$key];
      } else {
        return $default;
      }
    }

    return $config;
  }
}

// Usage:
// $config = new Config();
// $databaseConfig = $config->get('database'); // Gets the entire database configuration
// $host = $config->get('database.host'); // Gets only the host from the database configuration