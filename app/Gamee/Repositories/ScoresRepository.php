<?php

namespace App\Gamee\Repositories;

use Predis\Client;

class ScoresRepository
{

    /**
     * @var Client
     */
    private $connection;

    /**
     * @param Client $connection
     */
    public function __construct(Client $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * @param  int $gameId
     * @param  int $userId
     * @param  int $score
     * @return bool
     */
    public function store($gameId, $userId, $score)
    {
        $storage = $this->getConnection();

        return $storage->zAdd($gameId, $userId, $score);
    }

    /**
     * @return Client
     */
    public function getConnection(): Client
    {
        return $this->connection;
    }

    /**
     * @param Client $connection
     *
     * @return self
     */
    public function setConnection(Client $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

}
