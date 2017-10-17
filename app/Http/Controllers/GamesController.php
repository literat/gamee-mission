<?php

namespace App\Http\Controllers;

use JsonRpc\Server;
use App\Gamee\Repositories\GamesRepository;

class GamesController extends JsonRpcController
{

    /**
     * @param GamesRepository $serverMethodsClass
     */
    public function __construct(GamesRepository $serverMethodsClass)
    {
        $this->setServerMethodsClass($serverMethodsClass);
    }

}
