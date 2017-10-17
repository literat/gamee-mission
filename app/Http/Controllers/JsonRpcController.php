<?php

namespace App\Http\Controllers;

use JsonRpc\Server;
use App\Gamee\Repositories\Repository;

abstract class JsonRpcController
{

    /**
     * @var Repository
     */
    protected $serverMethodsClass;

    public function receive()
    {
        $this->createServer()->receive();
    }

    /**
     * @return Server
     */
    protected function createServer()
    {
        return new Server($this->getServerMethodsClass());
    }

    /**
     * @return Repository
     */
    protected function getServerMethodsClass(): Repository
    {
        return $this->serverMethodsClass;
    }

    /**
     * @param  Repository $serverMethodsClass
     * @return self
     */
    protected function setServerMethodsClass($serverMethodsClass): self
    {
        $this->serverMethodsClass = $serverMethodsClass;

        return $this;
    }

}
