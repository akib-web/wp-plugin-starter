<?php
if (!function_exists('view')) {
  function view($view, $data = [])
  {
    // // Define the path to your views directory
    $viewsPath = PIKU_WPS_PLUGIN_PATH . '/src/app/Resources/views';

    // Define the path to the compiled views cache directory
    $cachePath = PIKU_WPS_PLUGIN_PATH . '/src/app/Storage/cache';

    // Initialize Blade with the views directory and cache directory
    $blade = new \Jenssegers\Blade\Blade($viewsPath, $cachePath);
    // global $blade;
    return $blade->make($view, $data)->render();
  }
}
if (!function_exists('config')) {
  function config($view)
  {
  }
}
