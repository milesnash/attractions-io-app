<?php

namespace AttractionsIo\Domain\ValueObject;

/**
 * ValueObjectInterface
 * 
 * Value objects are:
 *  • immutable, so all props must not be public and
 *    prop setters methods should never be exposed;
 *  • only have meaning in the context of an entity,
 *    so they should never have their own identifier prop.
 */
interface ValueObjectInterface
{
    /**
     * Test if this value object is equal to another
     * 
     * Structural equality is a core concept of the value object.
     * On a per-implementation basis, we simply define
     * an appropriate equality test for that class.
     *
     * @param ValueObjectInterface $valueObject
     * 
     * @return boolean
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool;
}