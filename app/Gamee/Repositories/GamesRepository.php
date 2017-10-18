<?php

namespace App\Gamee\Repositories;

use App\Gamee\Validator;
use App\Gamee\Ranking\Position;
use App\Gamee\Ranking\Ranker;
use Predis\Client;

class GamesRepository extends Repository
{

    const WITH_SCORES = 'WITHSCORES';

    /**
     * @var Ranker
     */
    private $ranker;

    /**
     * @param Client $connection
     */
    public function __construct(Client $connection, Ranker $ranker)
    {
        $this->setConnection($connection);
        $this->setRanker($ranker);
    }

    /**
     * @param  int $gameId
     * @param  int $limit
     * @return array
     */
    public function fetchRanking(int $gameId, int $limit = 10): array
    {
        $errors[] = (new Validator($gameId))->integer()->greaterOrEqual(1)->getErrorMessages();

        $this->setError($errors);

        $rankings = $this->getConnection()->zRevRange($gameId, 0, $limit - 1, self::WITH_SCORES);

        $positions = $this->fillPositions($rankings, $gameId);
        $this->applyRanks($positions);

        return $positions;
    }

    /**
     * @param array $positions
     */
    private function applyRanks(array $positions)
    {
        $this->getRanker()->rank($positions);
    }

    /**
     * @param  array  $rankings
     * @param  int    $gameId
     * @return array
     */
    private function fillPositions(array $rankings, int $gameId): array
    {
        $ranks = [];
        foreach ($rankings as $playerId => $score) {
            $rank = new Position();
            $rank->gameId = $gameId;
            $rank->playerId = $playerId;
            $rank->score = (int) $score;

            $ranks[] = $rank;
        }

        return $ranks;
    }

    /**
     * @return Ranker
     */
    public function getRanker()
    {
        return $this->ranker;
    }

    /**
     * @param  Ranker $ranker
     * @return self
     */
    public function setRanker(Ranker $ranker): self
    {
        $this->ranker = $ranker;

        return $this;
    }

}
