<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use \str_pad;
use RuntimeException;
use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\ValueObject\Name;

class NameTest extends TestCase
{
    public function test_it_throws_exception_when_input_above_max_length()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Max length is 32 characters');

        $name = new Name(str_pad('', 33, 'a'));
    }
}
