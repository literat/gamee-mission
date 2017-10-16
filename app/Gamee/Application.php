<?php

namespace App\Gamee;

use AltoRouter;
use Nette\DI\Container;

class Application
{

    /**
     * @var AltoRouter
     */
    private $router;

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container  $container
     * @param AltoRouter $router
     */
    public function __construct(Container $container, AltoRouter $router)
    {
        $this->setRouter($router);
        $this->setContainer($container);
    }

    /**
     * Application runner
     *
     * @return string
     */
    public function run()
    {
        $this->processRequest();
    }

    private function processRequest()
    {
        $router = $this->getRouter();
        require __DIR__ . '/../Http/routes.php';

        $match = $router->match();

        list($controller, $method) = explode('#', $match['target']);

        $this->callOrFail($controller, $method, $match['params']);
    }

    /**
     * @param  string $controllerName
     * @param  string $methodName
     * @param  mixed  $parameters
     */
    private function callOrFail($controllerName, $methodName, $parameters)
    {
        if (is_callable([$controllerName, $methodName])) {
            $controller = $this->getContainer()->getByType($controllerName);
            $controller->{$methodName}($parameters);
        } else {
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }

    /**
     * @return AltoRouter
     */
    private function getRouter(): AltoRouter
    {
        return $this->router;
    }

    /**
     * @param  AltoRouter $router
     * @return self
     */
    private function setRouter(AltoRouter $router): self
    {
        $this->router = $router;

        return $this;
    }


    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param  Container $container
     * @return self
     */
    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

}
