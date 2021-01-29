<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\Entity\AbstractEntity;

class EntityOne extends AbstractEntity
{
    public function __construct(
        protected ?string $id = null,
    ) {
        $this->id = $id ?? base_convert(rand(), 10, 16);
    }
}

class EntityTwo extends AbstractEntity
{
    public function __construct(
        protected ?string $id = null,
    ) {
        $this->id = $id ?? base_convert(rand(), 10, 16);
    }
}

class AbstractEntityTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $setterInputs = [
            'id' => [
                'typeValue' => 'mytestid',
            ],
        ];

        $registeredUser = new EntityOne();

        foreach ($setterInputs as $propName => $inputData) {
            $setValue = isset($inputData['setValue']) ?
                $inputData['setValue'] :
                $inputData['typeValue'];
            
            $registeredUser->{"set{$propName}"}($setValue);

            $getValue = $registeredUser->{"get{$propName}"}() instanceof SingleValueObjectInterface ?
                $registeredUser->{"get{$propName}"}()->getValue() :
                $registeredUser->{"get{$propName}"}();

            $this->assertEquals(
                $inputData['typeValue'],
                $getValue
            );
        }
    }

    public function test_it_returns_false_when_other_object_is_different_class()
    {
        $entity = new EntityOne('Foo');

        $this->assertFalse($entity->isEqualTo(new EntityTwo('Foo')));
    }

    public function test_it_returns_false_when_id_is_not_equal()
    {
        $entity = new EntityOne('Foo');

        $this->assertFalse($entity->isEqualTo(new EntityOne('Bar')));
    }

    public function test_it_returns_true_when_id_is_equal()
    {
        $entity = new EntityOne('Foo');

        $this->assertTrue($entity->isEqualTo(new EntityOne('Foo')));
    }
}
