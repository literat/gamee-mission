<?php

namespace App\Gamee\Repositories;

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
        return $this->getConnection()->zRevRange($gameId, 0, $limit - 1, self::WITH_SCORES);
    }

}
