<?php

namespace AttractionsIo\Domain\ValueObject\Test;

use \str_pad;
use RuntimeException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\ValueObject\Name;
use AttractionsIo\Domain\ValueObject\Email;
use AttractionsIo\Domain\ValueObject\Password;
use AttractionsIo\Domain\Entity\RegisteredUser;
use AttractionsIo\Domain\ValueObject\DateOfBirth;
use AttractionsIo\Domain\ValueObject\SingleValueObjectInterface;

class RegisteredUserTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $datetime = (new DateTimeImmutable('-13 years'))->modify('midnight');

        $setterInputs = [
            'id' => [
                'typeValue' => 'mytestid',
            ],
            'firstName' => [
                'setValue' => new Name('Foo'),
                'typeValue' => 'Foo',
            ],
            'lastName' => [
                'setValue' => new Name('Bar'),
                'typeValue' => 'Bar',
            ],
            'dateOfBirth' => [
                'setValue' => new DateOfBirth($datetime),
                'typeValue' => $datetime,
            ],
            'email' => [
                'setValue' => new Email('foo@example.com'),
                'typeValue' => 'foo@example.com',
            ],
            'password' => [
                'setValue' => new Password('PlsChgMe!'),
                'typeValue' => 'PlsChgMe!',
            ],
        ];

        $registeredUser = new RegisteredUser(
            new Name('Joe'),
            new Name('Bloggs'),
            new DateOfBirth(new DateTimeImmutable('-14 years')),
            new Email('bar@example.com'),
            new Password('test1234')
        );

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

    public function test_it_returns_false_when_entity_is_not_equal()
    {
        $registeredUser1 = new RegisteredUser(
            new Name('Joe'),
            new Name('Bloggs'),
            new DateOfBirth(new DateTimeImmutable('-14 years')),
            new Email('bar@example.com'),
            new Password('test1234'),
            '123abc'
        );

        $registeredUser2 = new RegisteredUser(
            new Name('Joe'),
            new Name('Bloggs'),
            new DateOfBirth(new DateTimeImmutable('-14 years')),
            new Email('bar@example.com'),
            new Password('test1234'),
            '456def'
        );

        $this->assertFalse($registeredUser1->isEqualTo($registeredUser2));
    }

    public function test_it_returns_true_when_value_is_equal()
    {
        $registeredUser1 = new RegisteredUser(
            new Name('Joe'),
            new Name('Bloggs'),
            new DateOfBirth(new DateTimeImmutable('-14 years')),
            new Email('bar@example.com'),
            new Password('test1234'),
            '123abc'
        );

        $registeredUser2 = new RegisteredUser(
            new Name('Joe'),
            new Name('Bloggs'),
            new DateOfBirth(new DateTimeImmutable('-14 years')),
            new Email('bar@example.com'),
            new Password('test1234'),
            '123abc'
        );

        $this->assertTrue($registeredUser1->isEqualTo($registeredUser2));
    }
}