<?php

$methods = new App\Gamee\Repositories\ScoresRepository();
$server = new JsonRpc\Server($methods);
$server->receive();
