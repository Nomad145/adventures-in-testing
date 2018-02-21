<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use AcmeBank\Account;
use AcmeBank\Exception\InsufficientFundsException;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class AccountTest extends TestCase
{
    public function testDepositPositiveNumber()
    {
        $subject = new Account();

        $subject->deposit(10.0);

        $this->assertEquals(10.0, $subject->getBalance());
    }

    public function testDepositNegativeNumber()
    {
        $subject = new Account();

        $this->expectException(\InvalidArgumentException::class);

        $subject->deposit(-10.0);
    }

    public function testWithdrawPositiveNumber()
    {
        $subject = new Account();

        $subject->deposit(10.0);
        $subject->withdraw(5.0);

        $this->assertEquals(5.0, $subject->getBalance());
    }

    public function testWithdrawNegativeNumber()
    {
        $subject = new Account();

        $this->expectException(\InvalidArgumentException::class);

        $subject->withdraw(-10.0);
    }

    public function testOverdraft()
    {
        $subject = new Account();

        $this->expectException(InsufficientFundsException::class);

        $subject->withdraw(5.0);
    }
}
