<?php

class Router
{
  protected $routes = [
    'GET' => [],
    'POST' => [],
    'PUT' => [],
    'DELETE' => []
  ];

  public static function load($file)
  {
    $router = new static;

    require $file;

    return $router;
  }

  public function get($uri, $controller)
  {
    $this->routes['GET'][$uri] = $controller;
  }

  public function post($uri, $controller)
  {
    $this->routes['POST'][$uri] = $controller;
  }

  public function put($uri, $controller)
  {
    $this->routes['PUT'][$uri] = $controller;
  }

  public function delete($uri, $controller)
  {
    $this->routes['DELETE'][$uri] = $controller;
  }

  public function direct($uri, $requestType)
  {
    $url = $uri[0];
    if(isset($uri[1])) {
      $id = $uri[1];
    }else{
      $id = null;
    }
    if(array_key_exists($url, $this->routes[$requestType])) {
      return $this->callAction(
        $id,
        ...explode('@', $this->routes[$requestType][$url])
      );
    }
    throw new Exception('No route defined for this URI.');
  }

  protected function callAction($id, $controller, $action)
  {
    $controller = new $controller;

    if(!method_exists($controller, $action)) {
      throw new Exception(
        "{$controller} does not respond to the {$action} action."
      );
    }

    return $controller->$action($id);
  }
}

?>
