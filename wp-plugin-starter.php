<?php

/**
 * Plugin Name: Wp Plugin Starter
 * Plugin URI: https://github.com/akib-web/wp-plugin-starter
 * Description: Wp plugin starter kit.
 * Version: 1.0.0
 * Author: Md Akib Rahman
 * Author URI: https://mdakibrahman.com
 * Text Domain: wp-plugin-starter
 * Domain Path: /i18n/languages/
 * Requires at least: 1.0.0
 * Requires PHP: 8.1
 *
 * @package WpPluginStarter
 */


defined('ABSPATH') || exit;

if (!defined('PIKU_WPS_PLUGIN_FILE')) {
  define('PIKU_WPS_PLUGIN_FILE', __FILE__);
}
if (!defined('PIKU_WPS_PLUGIN_PATH')) {
  define('PIKU_WPS_PLUGIN_PATH', __DIR__);
}

if (file_exists(__DIR__ . '/src/vendor/autoload.php')) {
  // Load the autoloader.
  require __DIR__ . '/src/vendor/autoload.php';
} else {
  echo 'Problem in post scraper plugin';
  wp_die();
}

if (!\App\WpPluginStarter::init()) {
  return;
}

\App\WpPluginStarter::init();





function display_products_shortcode()
{
  // $products = \App\Models\Product::all();
  // $data = [
  //   'name' => 'John Doe',
  //   'email' => 'john@example.com',
  //   'age' => 30
  // ];

  // Dump the data and halt execution
  // dd($data);

  return view('test', ['title' => 'My Plugin', 'name' => 'World']);
}
add_shortcode('display_products', 'display_products_shortcode');
