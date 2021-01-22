<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use \str_pad;
use RuntimeException;
use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\ValueObject\Password;

class PasswordTest extends TestCase
{
    public function test_it_returns_false_when_value_is_not_equal()
    {
        $password = new Password('1234');

        $this->assertFalse($password->isEqualTo(new Password('4321')));
    }

    public function test_it_returns_true_when_value_is_equal()
    {
        $password = new Password('1234');

        $this->assertTrue($password->isEqualTo(new Password('1234')));
    }
}
