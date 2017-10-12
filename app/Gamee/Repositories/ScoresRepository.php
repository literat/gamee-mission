<?php

namespace App\Gamee\Repositories;

class ScoresRepository
{

  public $error = null;

  public function divide($dividend, $divisor, $int = false)
  {

    if (!$divisor)
    {
      $this->error = 'Cannot divide by zero';
    }
    else
    {
      $quotient = $dividend / $divisor;
      return $int ? (int) $quotient : $quotient;
    }

  }

}
