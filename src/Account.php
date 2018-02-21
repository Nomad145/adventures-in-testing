<?php

namespace AcmeBank;

use AcmeBank\Exception\InsufficientFundsException;
use AcmeBank\Deposit;
use AcmeBank\Withdrawal;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class Account
{
    protected $ledger;

    public function __construct()
    {
        $this->ledger = new Ledger();
    }

    public function deposit(float $amount)
    {
        $this->ledger->addTransaction(new Deposit($amount));
    }

    public function withdraw(float $amount)
    {
        if ($this->getBalance() < $amount) {
            throw new InsufficientFundsException('Cannot withdraw more money than you own!');
        }

        $this->ledger->addTransaction(new Withdrawal($amount));
    }

    public function getBalance() : float
    {
        return $this->ledger->getBalance();
    }
}
