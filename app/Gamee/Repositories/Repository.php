<?php

namespace App\Gamee\Repositories;

use Predis\Client;

abstract class Repository
{

    /**
     * @var Client
     */
    protected $connection;

    /**
     * @param Client $connection
     */
    public function __construct(Client $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * @return Client
     */
    protected function getConnection(): Client
    {
        return $this->connection;
    }

    /**
     * @param Client $connection
     *
     * @return self
     */
    protected function setConnection(Client $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

}
