<?php

namespace App\Gamee\Repositories;

use Predis\Client;
use App\Exceptions\ValidationException;
use App\Gamee\Validator;

class ScoresRepository extends Repository
{

    /**
     * @param  int $gameId
     * @param  int $userId
     * @param  int $score
     * @return bool
     */
    public function store(int $gameId, int $playerId, int $score)
    {
        $errors[] = (new Validator($gameId))->integer()->greaterOrEqual(1)->getErrorMessages();
        $errors[] = (new Validator($playerId))->integer()->greaterOrEqual(1)->getErrorMessages();
        $errors[] = (new Validator($score))->integer()->greaterOrEqual(0)->getErrorMessages();

        $this->setError($errors);

        return $this->getConnection()->zAdd($gameId, $score, $playerId);
    }

}
