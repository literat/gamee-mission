<?php

namespace App\Gamee;

class Application
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->setRouter($router);
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

    /**
     * @return string
     */
    private function processRequest()
    {
        $router = $this->getRouter();
        $router->load(__DIR__ . '/../Http/routes.php');
        require __DIR__ . '/../../' . $router->direct(Request::uri());
    }

    /**
     * @return Router
     */
    private function getRouter()
    {
        return $this->router;
    }

    /**
     * @param  Router $router
     * @return self
     */
    private function setRouter(Router $router)
    {
        $this->router = $router;

        return $this;
    }

}
