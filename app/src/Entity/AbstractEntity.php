<?php

namespace AttractionsIo\Domain\Entity;

abstract class AbstractEntity implements EntityInterface
{
    /**
     * {@inheritDoc}
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId(string $id): EntityInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isEqualTo(EntityInterface $entity): bool
    {
        return (
            $entity::class === $this::class
            &&
            $entity->getId() === $this->getId()
        );
    }
}
