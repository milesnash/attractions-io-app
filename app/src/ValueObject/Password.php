<?php

namespace AttractionsIo\Domain\ValueObject;

use \strlen;
use RuntimeException;

class Password extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {
        if (strlen($this->value) > 32) {
            throw new RuntimeException('Max length is 32 characters');
        }
    }
}