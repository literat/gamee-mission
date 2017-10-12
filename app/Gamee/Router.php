<?php

namespace App\Gamee;

use Exception;

class Router
{

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @param  string $file
     * @return self
     */
    public function load($file)
    {
        $router = $this;

        require $file;

        return $router;
    }

    /**
     * @param  array $routes
     * @return self
     */
    public function define($routes)
    {
        $this->routes = $routes;

        return $this;
    }

    /**
     * @param  string $uri
     * @return string | Exception
     */
    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new Exception('No route defined for this URI');
    }

}
