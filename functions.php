<?php

if (!function_exists('get_plugin_root_path')) {
  function get_plugin_root_path()
  {
    $rootPath = plugin_dir_path(__FILE__);
    return $rootPath;
  }
}
// dd('okay');