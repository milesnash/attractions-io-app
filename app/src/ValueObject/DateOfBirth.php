<?php

namespace AttractionsIo\Domain\ValueObject;

use DateTimeZone;
use DateTimeImmutable;

class DateOfBirth extends AbstractSingleValueObject
{
    public function __construct(
        protected DateTimeImmutable $value,
    ) {
        $this->value = $value->setTimezone(new DateTimeZone('UTC'));
    }

    /**
     * {@inheritDoc}
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        if (!$valueObject instanceof SingleValueObjectInterface
            ||
            !$valueObject->getValue() instanceof DateTimeImmutable
        ) {
            return false;
        }

        // Day of the year is the appropriate resolution for date of birth
        return $valueObject->getValue()->setTimezone(new DateTimeZone('UTC'))->format('Y-m-d') === $this->getValue()->format('Y-m-d');
    }
}