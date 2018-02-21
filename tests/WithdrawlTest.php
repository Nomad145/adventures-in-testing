<?php

namespace Test;

use PHPUnit\Framework\TestCase;

use AcmeBank\Withdrawal;

/**
 * @author Michael Phillips <michael.phillips@realpage.com>
 */
class WithdrawalTest extends TestCase
{
    public function testGetAmount()
    {
        $subject = new Withdrawal(5.0);

        $this->assertEquals(-5.0, $subject->getAmount());
    }

    public function testNegativeWithdrawalAmount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $subject = new Withdrawal(-5.0);
    }
}
