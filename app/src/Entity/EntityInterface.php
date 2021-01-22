<?php

namespace AttractionsIo\Domain\Entity;

interface EntityInterface
{
    /**
     * Get entity id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set entity id
     *
     * @param string $id
     * 
     * @return EntityInterface
     */
    public function setId(string $id): EntityInterface;

    /**
     * Test if this entity is equal to another
     *
     * Identifier equality is a core concept of the entity.
     * All implementations should determine equality by comparing ids.
     *
     * @param EntityInterface $entity
     *
     * @return boolean
     */
    public function isEqualTo(EntityInterface $entity): bool;
}