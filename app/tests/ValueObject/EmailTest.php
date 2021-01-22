<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use \str_pad;
use RuntimeException;
use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\ValueObject\Email;

class EmailTest extends TestCase
{
    public function test_it_returns_false_when_value_is_not_equal()
    {
        $email = new Email('foo@example.com');

        $this->assertFalse($email->isEqualTo(new Email('bar@example.com')));
    }

    public function test_it_returns_true_when_value_is_equal()
    {
        $email = new Email('foo@example.com');

        $this->assertTrue($email->isEqualTo(new Email('foo@example.com')));
    }
}
