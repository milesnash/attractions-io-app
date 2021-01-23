<?php

namespace AttractionsIo\Domain\ValueObject;

use \strlen;
use RuntimeException;

class Email extends AbstractSingleValueObject
{
    public function __construct(
        protected string $value,
    ) {
        if (strlen($this->value) > 254) {
            throw new RuntimeException('Max length is 254 characters');
        }
    }
}