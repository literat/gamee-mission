<?php

namespace App\Gamee\Repositories;

use Predis\Client;

abstract class Repository
{

    /**
     * @var string
     */
    public $error = '';

    /**
     * @var Client
     */
    protected $connection;

    /**
     * @var Validator
     */
    protected $validator;

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

    /**
     * @param array $errors
     */
    protected function setError(array $errors)
    {
        foreach ($errors as $error) {
            if (!empty($error)) {
                $this->error = json_encode($error);
                break;
            }
        }
    }

}
