<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use DateInterval;
use RuntimeException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\ValueObject\DateOfBirth;

class DateOfBirthTest extends TestCase
{
    public function test_it_returns_false_when_value_is_not_equal()
    {
        $dt1 = new DateTimeImmutable('-13 years');
        $dob1 = new DateOfBirth($dt1);
        $dt2 = new DateTimeImmutable('-13 years - 1 day');
        $dob2 = new DateOfBirth($dt2);

        $this->assertFalse($dob1->isEqualTo($dob2));
    }

    public function test_it_returns_true_when_value_is_equal()
    {
        $dt1 = new DateTimeImmutable('-13 years');
        $dob1 = new DateOfBirth($dt1);
        $dt2 = new DateTimeImmutable('-13 years');
        $dob2 = new DateOfBirth($dt2);

        $this->assertTrue($dob1->isEqualTo($dob2));
    }
}
