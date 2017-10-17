<?php

$router->map('POST', '/scores', 'App\Http\Controllers\ScoresController#receive');
$router->map('POST', '/games', 'App\Http\Controllers\GamesController#receive');
