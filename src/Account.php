<?php

namespace AcmeBank;

use AcmeBank\Exception\InsufficientFundsException;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class Account
{
    protected $balance = 0.0;

    public function deposit(float $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Cannot deposit amount less than or equal to zero.');
        }

        $this->balance += $amount;
    }

    public function withdraw(float $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Cannot withdraw amount less than or equal to zero.');
        }

        if ($this->balance < $amount) {
            throw new InsufficientFundsException('Cannot withdraw more money than you own!');
        }

        $this->balance -= $amount;

        return $amount;
    }

    public function getBalance() : float
    {
        return $this->balance;
    }
}
