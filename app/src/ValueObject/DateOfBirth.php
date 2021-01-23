<?php

namespace AttractionsIo\Domain\ValueObject;

use DateTimeZone;
use DateTimeImmutable;

class DateOfBirth extends AbstractSingleValueObject
{
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
        return $valueObject->getValue()->setTimezone(new DateTimeZone('UTC')) == $this->getValue();
    }
}