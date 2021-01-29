<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use AttractionsIo\Domain\ValueObject\AbstractSingleValueObject;
use PHPUnit\Framework\TestCase;

class ValueObjectOne extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {}
}

class ValueObjectTwo extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {}
}

class AbstractSingleValueObjectTest extends TestCase
{
    public function test_it_returns_false_when_other_object_is_different_class()
    {
        $valueObject = new ValueObjectOne('Foo');

        $this->assertFalse($valueObject->isEqualTo(new ValueObjectTwo('Foo')));
    }

    public function test_it_returns_false_when_value_is_not_equal()
    {
        $valueObject = new ValueObjectOne('Foo');

        $this->assertFalse($valueObject->isEqualTo(new ValueObjectOne('Bar')));
    }

    public function test_it_returns_true_when_value_is_equal()
    {
        $valueObject = new ValueObjectOne('Foo');

        $this->assertTrue($valueObject->isEqualTo(new ValueObjectOne('Foo')));
    }

    public function test_it_returns_value()
    {
        $valueObject = new ValueObjectOne('Foo');

        $this->assertEquals('Foo', $valueObject->getValue());
    }
}
