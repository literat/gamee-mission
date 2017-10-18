<?php

/**
 * based ond https://github.com/mcls/php-ranker
 */

namespace App\Gamee\Ranking\Strategies;

abstract class Base
{

    /**
     * @var string
     */
    protected $orderBy = 'score';

    /**
     * @var string
     */
    protected $rankingProperty = 'ranked';

    /**
     * @var null
     */
    protected $lastRankable = null;

    /**
     * @param string $property
     */
    public function setOrderBy(string $property)
    {
        $this->orderBy = $property;
    }

    /**
     * @param string $property
     */
    public function setRankingProperty(string $property)
    {
        $this->rankingProperty = $property;
    }

    /**
     * @param  object $sortedRankables
     */
    public function rank($sortedRankables)
    {
        $this->lastRankable = null;

        foreach ($sortedRankables as $rankingIndex => $rankable) {
            $this->assignRanking($rankable, $rankingIndex);
            $this->lastRankable = $rankable;
        }
    }

    /**
     * @param  object $rankable
     * @param  int    $rankingIndex
     */
    protected function assignRanking($rankable, int $rankingIndex)
    {
        $property = $this->orderBy;

        if ($this->lastRankable == null) {
            $this->whenFirst($rankable, $rankingIndex);
        } else if ($rankable->$property == $this->lastRankable->$property) {
            $this->whenEqual($rankable, $rankingIndex);

        } else {
            $this->whenDifferent($rankable, $rankingIndex);
        }
    }

    /**
     * @param  object $rankable
     */
    protected function whenFirst($rankable)
    {
        $this->setRanking($rankable, 1);
    }

    /**
     * @param  object $rankable
     */
    abstract protected function whenEqual($rankable);

    /**
     * @param  object $rankable
     */
    abstract protected function whenDifferent($rankable);

    /**
     * @param object &$rankable
     * @param int    $ranking
     */
    protected function setRanking(&$rankable, int $ranking)
    {
        $rankable->{$this->rankingProperty} = $ranking;
    }
}
