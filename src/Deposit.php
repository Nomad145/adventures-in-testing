<?php

namespace AcmeBank;

use AcmeBank\TransactionInterface;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class Deposit implements TransactionInterface
{
    private $amount;

    public function __construct(float $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Cannot deposit negative funds.');
        }

        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
