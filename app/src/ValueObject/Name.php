<?php

namespace AttractionsIo\Domain\ValueObject;

class Name extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {}
}