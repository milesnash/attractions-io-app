<?php

namespace AttractionsIo\Domain\ValueObject;

class Password extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {}
}