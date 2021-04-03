<?php

use Closure;

class Router
{
    /** @var string */
    public string $request;

    /** @var array */
    public array $routes = [];

    /** @param array $request */
    public function __construct(array $request)
    {
        $this->request = basename($request['REQUEST_URI']);
    }

    /**
     * @param string $uri
     * @param Closure $fn
     */
    public function addRoute(string $uri, Closure $fn): void
    {
        $this->routes[$uri] = $fn;
    }

    /**
     * @param string $uri
     * @return boolean
     */
    public function hasRoute(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    /** @return mixed */
    public function run()
    {
        if ($this->hasRoute($this->request)) {
            $this->routes[$this->request]->call($this);
        }
    }
}
