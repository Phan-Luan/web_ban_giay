<?php

namespace App;

class Router
{
  public static $routes = []; //đường dẫn
  protected $request;

  public function __construct()
  {
    $this->request = new Request();
  }


  public static function get($path, $callback)
  {
    static::$routes['get'][$path] = $callback;
  }

  public static function post($path, $callback)
  {
    static::$routes['post'][$path] = $callback;
  }

  public function getPath()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $path = str_replace("/public/", '/', $path);
    $poisition = strpos($path, '?');
    if ($poisition) {
      $path = substr($path, 0, $poisition);
    }
    return $path;
  }

  //lấy ra phương thức người dùng yêu cầu
  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function resolve()
  {
    $path = $this->getPath();
    $method = $this->getMethod();

    $callback = static::$routes[$method][$path] ?? false;
    if ($callback === false) {
      echo "404 FILE NOT FOUND";
      exit;
    }

    //nếu callback là 1 fn 
    if (is_callable($callback)) {
      return $callback();
    }
    //nếu callback là 1 array
    if (is_array($callback)) {
      $class = new $callback[0];
      $action = $callback[1];
      // return call_user_func_array([$class, $action], []);
      return call_user_func([$class, $action], $this->request);
    }
  }
}
