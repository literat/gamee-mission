<?php

$methods = new App\Gamee\Repositories\GamesRepository();
$server = new JsonRpc\Server($methods);
$server->receive();
