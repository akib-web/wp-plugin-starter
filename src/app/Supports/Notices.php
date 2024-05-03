<?php

namespace App\Supports;

class Notices
{
  /**
   * Display a notice.
   *
   * @param string $message The message to display.
   * @param string $type    The type of notice (error, warning, success, info).
   */
  public static function display_notice($message, $type = 'success')
  {
    $allowed_types = array('success', 'error', 'warning', 'info');
    $type_class = in_array($type, $allowed_types) ? $type : 'success';

    echo "<div class='notice notice-$type_class is-dismissible'><p>$message</p></div>";
  }
}
