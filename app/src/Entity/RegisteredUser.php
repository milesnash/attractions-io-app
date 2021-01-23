<?php

namespace AttractionsIo\Domain\Entity;

use \base_convert;
use \rand;
use AttractionsIo\Domain\ValueObject\Name;
use AttractionsIo\Domain\ValueObject\Email;
use AttractionsIo\Domain\ValueObject\Password;
use AttractionsIo\Domain\ValueObject\DateOfBirth;

class RegisteredUser extends AbstractEntity
{
    public function __construct(
        private Name $firstName,
        private Name $lastName,
        private DateOfBirth $dob,
        private Email $email,
        private Password $password,
        protected ?string $id = null,
    ) {
        $this->id = $id ?? base_convert(rand(), 10, 16);
    }

    public function getFirstName(): Name
    {
        return $this->firstName;
    }

    public function setFirstName(Name $firstName): RegisteredUser
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): Name
    {
        return $this->lastName;
    }

    public function setLastName(Name $lastName): RegisteredUser
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDateOfBirth(): DateOfBirth
    {
        return $this->dob;
    }

    public function setDateOfBirth(DateOfBirth $dob): RegisteredUser
    {
        $this->dob = $dob;

        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): RegisteredUser
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function setPassword(Password $password): RegisteredUser
    {
        $this->password = $password;

        return $this;
    }
}