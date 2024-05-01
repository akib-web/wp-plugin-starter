<?php

/**
 * Plugin Name: Post Scraper
 * Plugin URI: https://woocommerce.com/
 * Description: Scrap data And create post with the scrapped data.
 * Version: 1.0.0
 * Author: Md Akib Rahman
 * Author URI: https://mdakibrahman.com
 * Text Domain: post-scraper
 * Domain Path: /i18n/languages/
 * Requires at least: 1.0.0
 * Requires PHP: 8.1
 *
 * @package PostScraper
 */


defined('ABSPATH') || exit;

if (!defined('PIKU_PS_PLUGIN_FILE')) {
  define('PIKU_PS_PLUGIN_FILE', __FILE__);
  define('PIKU_PS_PLUGIN_PATH', __DIR__);
}

if (file_exists(__DIR__ . '/src/vendor/autoload.php')) {
  // Load the autoloader.
  require __DIR__ . '/src/vendor/autoload.php';
} else {
  echo 'Problem in post scraper plugin';
  wp_die();
}

if (!\App\PostScraper::init()) {
  return;
}

\App\PostScraper::init();





function display_products_shortcode()
{
  $products = \App\Models\Product::all();
  $data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'age' => 30
  ];

  // Dump the data and halt execution
  // dd($data);

  return view('test', ['title' => 'My Plugin', 'name' => 'World', 'products' => $products]);
}
add_shortcode('display_products', 'display_products_shortcode');