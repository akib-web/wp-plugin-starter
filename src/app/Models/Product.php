<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $table = "wp_options";
  protected $fillable = ['option_name', 'option_value'];
}