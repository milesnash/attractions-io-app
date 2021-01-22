<?php

namespace AttractionsIo\Domain\ValueObject;

/**
 * SingleValueObjectInterface
 * 
 * A special variant of value object
 * that contains just a single value.
 */
interface SingleValueObjectInterface extends ValueObjectInterface
{
    /**
     * Get the object's value
     * 
     * The return value can be mixed because
     * the constructor enforces a single value
     * input of a specific type, which is this
     * function's return value.
     *
     * @return mixed
     */
    public function getValue(): mixed;
}