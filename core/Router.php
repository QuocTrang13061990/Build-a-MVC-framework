<?php

namespace app\core;

use RuntimeException;

class Router {
    public Request $request;
    public array $routes = array();

    /**
     * Router constructor
     * 
     * @param \app\core\Request $request
     * 
     */
    /**
     * Class constructor.
     */
    public function __construct(\app\core\Request $request) {
        $this->request = $request;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
        // $routes = array(
        //     'get' => array(
        //         '/git/mvcframework/' => $callback,
        //         '/git/mvcframework/contact/' => 
        //     ),
        //     'post' => array(

        //     )
        // );
    }
  
    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod(); // get, post
        $callback = $this->routes[$method][$path] ?? false;
        var_dump($path);exit;
        if ($callback === false) {
            return 'not found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view) {
        include_once __DIR__ . '/../views/' . $view . '.php';
    }
}