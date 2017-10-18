<?php

namespace App\Gamee\Ranking;

use JsonSerializable;

class Position implements JsonSerializable
{

    /**
     * @var int
     */
    public $gameId;

    /**
     * @var int
     */
    public $playerId;

    /**
     * @var int
     */
    public $ranked = null;

    /**
     * @var int
     */
    public $score;

    /**
     * @return array
     */
    public function jsonSerialize() {
        return [
            'gameId'   => $this->gameId,
            'playerId' => $this->playerId,
            'score'    => $this->score,
            'ranked'   => $this->ranked,
        ];
    }

}
