<?php

namespace AcmeBank;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class Ledger
{
    protected $transactions = [];

    public function addTransaction(TransactionInterface $transaction)
    {
        $this->transactions[] = $transaction;
    }

    public function getBalance() : float
    {
        return array_reduce(
            $this->transactions,
            function (float $carry, TransactionInterface $transaction) {
                return $carry += $transaction->getAmount();
            },
            0.0
        );
    }
}
