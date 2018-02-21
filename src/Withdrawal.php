<?php

namespace AcmeBank;

use AcmeBank\TransactionInterface;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class Withdrawal implements TransactionInterface
{
    public function __construct(float $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Cannot withdraw negative funds.');
        }

        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount * -1;
    }
}
