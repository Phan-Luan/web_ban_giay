<?php

namespace App\Controllers;

class Controller
{
  public function render($path, $data = [])
  {
    extract($data);
    include_once __DIR__ . "/../../resources/views/$path.php";
  }
}
