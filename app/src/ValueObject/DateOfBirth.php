<?php

namespace AttractionsIo\Domain\ValueObject;

use DateInterval;
use DateTimeZone;
use RuntimeException;
use DateTimeImmutable;

class DateOfBirth extends AbstractSingleValueObject
{
    private int $ageInYears;

    public function __construct(
        protected DateTimeImmutable $value,
    ) {
        $this->value = $value
            ->setTimezone(new DateTimeZone('UTC'))
            ->modify('midnight');

        $now = (new DateTimeImmutable('now', new DateTimeZone('UTC')))
            ->modify('midnight');

        $thirteenYearsAgo = $now->sub(new DateInterval('P13Y'));
            
        if ($thirteenYearsAgo < $this->value) {
            throw new RuntimeException('Minimum age is 13 years old');
        }

        $this->ageInYears = $now->format('Y') - $this->value->format('Y');
    }

    /**
     * {@inheritDoc}
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        if ($valueObject::class !== $this::class
            ||
            !$valueObject->getValue() instanceof DateTimeImmutable
        ) {
            return false;
        }

        return $valueObject->getValue()->setTimezone(new DateTimeZone('UTC')) == $this->getValue();
    }

    public function getAgeInYears(): int
    {
        return $this->ageInYears;
    }
}