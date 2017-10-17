<?php

namespace App\Gamee\Repositories;

use App\Gamee\Validator;

class GamesRepository extends Repository
{

    const WITH_SCORES = 'WITHSCORES';

    /**
     * @param  int $gameId
     * @param  int $limit
     * @return array
     */
    public function fetchRanking(int $gameId, int $limit = 10): array
    {
        $errors[] = (new Validator($gameId))->integer()->greaterOrEqual(1)->getErrorMessages();

        $this->setError($errors);

        return $this->getConnection()->zRevRange($gameId, 0, $limit - 1, self::WITH_SCORES);
    }

}
