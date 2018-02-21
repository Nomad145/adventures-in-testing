<?php

namespace Test;

use PHPUnit\Framework\TestCase;

use AcmeBank\Deposit;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class DepositTest extends TestCase
{
    public function testGetAmount()
    {
        $subject = new Deposit(5.0);

        $this->assertEquals(5.0, $subject->getAmount());
    }

    public function testNegativeDepositAmount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $subject = new Deposit(-5.0);
    }
}
