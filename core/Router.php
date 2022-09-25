<?php

namespace app\core;
class Router {
    public Request $request;
    protected array $routes = array();

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
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            echo 'not found';
            exit;
        }
        echo call_user_func($callback);
    }
}