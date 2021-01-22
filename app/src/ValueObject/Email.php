<?php

namespace AttractionsIo\Domain\ValueObject;

class Email extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {}
}