<?php

namespace App\Gamee;

use JsonRpc\Transport\BasicServer;

class ServerTransport extends BasicServer
{

    /**
     * @param  mixerd $data
     * @return string
     */
    public function reply($data)
    {
        header('Content-Type: application/json');
        echo $data;
        exit;
    }

}
