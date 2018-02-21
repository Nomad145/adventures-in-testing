<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use AcmeBank\Ledger;
use AcmeBank\Deposit;
use AcmeBank\Withdrawal;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class LedgerTest extends TestCase
{
    public function testAddTransaction()
    {
        $subject = new Ledger();

        $deposit = new Deposit(10.0);
        $subject->addTransaction($deposit);

        $this->assertEquals(10.0, $subject->getBalance());
    }

    public function testGetBalance()
    {
        $subject = new Ledger();

        $subject->addTransaction(new Deposit(100.0));
        $subject->addTransaction(new Withdrawal(25.50));

        $this->assertEquals(74.50, $subject->getBalance());
    }
}
