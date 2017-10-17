<?php

namespace App\Http\Controllers;

use JsonRpc\Server;
use App\Gamee\Repositories\ScoresRepository;

class ScoresController extends JsonRpcController
{

    /**
     * @param ScoresRepository $serverMethodsClass
     */
    public function __construct(ScoresRepository $serverMethodsClass)
    {
        $this->setServerMethodsClass($serverMethodsClass);
    }

}
