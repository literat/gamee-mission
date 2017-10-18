<?php

/**
 * based ond https://github.com/mcls/php-ranker
 */

namespace App\Gamee\Ranking;

use App\Gamee\Ranking\Strategies\Dense;

class Ranker
{

    /**
     * @var string
     */
    private $strategyName = 'dense';
    /**
     * @var Dense
     */
    private $strategy;

    /**
     * @var string
     */
    private $rankingProperty = 'ranked';

    /**
     * @var string
     */
    private $orderBy = 'score';

    public function __construct()
    {
        $this->strategy = new Dense();
    }

    /**
     * @return string
     */
    public function getRankingStrategy(): string
    {
        return $this->strategyName;
    }

    /**
     * @param array &$rankables
     */
    public function rank(&$rankables)
    {
        $this->strategy->setOrderBy($this->orderBy);
        $this->strategy->setRankingProperty($this->rankingProperty);
        $this->strategy->rank($rankables);
    }

}
