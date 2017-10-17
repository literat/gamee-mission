<?php

namespace App\Gamee;

class Validator
{

    /**
     * @var mixed
     */
    private $validatee;

    /**
     * @var array
     */
    private $errorMessages = [];

    /**
     * @param mixed $validatee
     */
    public function __construct($validatee)
    {
        $this->validatee = $validatee;
    }

    /**
     * @return array|null
     */
    public function getErrorMessages()
    {
        if (!empty($this->errorMessages)) {
            return $this->errorMessages;
        }
    }

    /**
     * @return self
     */
    public function integer(): self
    {
        if (!filter_var($this->validatee, FILTER_VALIDATE_INT) === 0 && !filter_var($this->validatee, FILTER_VALIDATE_INT)) {
            $this->errorMessages[] = 'Variable must be integer';
        }

        return $this;
    }

    /**
     * @param  int $minRange
     * @return self
     */
    public function greaterOrEqual(int $minRange): self
    {
        if ($this->validatee < $minRange) {
            $this->errorMessages[] = "Variable must be greater or equal then {$minRange}";
        }

        return $this;
    }

}
