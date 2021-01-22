<?php

namespace AttractionsIo\Domain\ValueObject;

abstract class AbstractSingleValueObject implements SingleValueObjectInterface
{
    /**
     * {@inheritDoc}
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (
            $valueObject instanceof SingleValueObjectInterface
            &&
            $valueObject->getValue() === $this->getValue()
        );
    }
}