<?php

$container = require __DIR__ . '/../app/bootstrap.php';

$container->getByType(App\Gamee\Application::class)
	->run();

