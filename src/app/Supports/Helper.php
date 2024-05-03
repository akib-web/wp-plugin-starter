<?php
defined('ABSPATH') || exit;

if (!function_exists('view')) {
  function view($view, $data = [])
  {
    // // Define the path to your views directory
    $viewsPath = get_plugin_root_path() . 'src/app/Resources/views';

    // Define the path to the compiled views cache directory
    $cachePath = get_plugin_root_path() . 'src/app/Storage/cache';

    // Initialize Blade with the views directory and cache directory
    $blade = new \Jenssegers\Blade\Blade($viewsPath, $cachePath);
    // global $blade;
    return $blade->make($view, $data)->render();
  }
}
