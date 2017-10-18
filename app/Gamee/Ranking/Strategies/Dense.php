<?php

/**
 * based ond https://github.com/mcls/php-ranker
 */

namespace App\Gamee\Ranking\Strategies;

/**
 * Dense ranking strategy ( 1223 )
 */
class Dense extends Base
{

    /**
     * @param  object $rankable
     */
    protected function whenEqual($rankable)
    {
        $this->setRanking($rankable, $this->lastRankable->{$this->rankingProperty});
    }

    /**
     * @param  object $rankable
     */
    protected function whenDifferent($rankable)
    {
        $this->setRanking($rankable, $this->lastRankable->{$this->rankingProperty} + 1);
    }

}
