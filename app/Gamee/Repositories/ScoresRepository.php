<?php

namespace App\Gamee\Repositories;

use Predis\Client;

class ScoresRepository extends Repository
{

    /**
     * @param  int $gameId
     * @param  int $userId
     * @param  int $score
     * @return bool
     */
    public function store($gameId, $playerId, $score)
    {
        return $this->getConnection()->zAdd($gameId, $score, $playerId);
    }

}
