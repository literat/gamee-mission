<?php

namespace App\Http\Controllers;

use JsonRpc\Server;
use App\Gamee\Repositories\ScoresRepository;

class ScoresController
{

    /**
     * @var ScoresRepository
     */
    private $serverMethodsClass;

    /**
     * @param ScoresRepository $serverMethodsClass
     */
    public function __construct(ScoresRepository $serverMethodsClass)
    {
        $this->setServerMethodsClass($serverMethodsClass);
    }

    public function receive()
    {
        $this->createServer()->receive();
    }

    /**
     * @return Server
     */
    private function createServer()
    {
        return new Server($this->getServerMethodsClass());
    }

    /**
     * @return ScoresRepository
     */
    public function getServerMethodsClass(): ScoresRepository
    {
        return $this->serverMethodsClass;
    }

    /**
     * @param  ScoresRepository $serverMethodsClass
     * @return self
     */
    public function setServerMethodsClass($serverMethodsClass): self
    {
        $this->serverMethodsClass = $serverMethodsClass;

        return $this;
    }

}
