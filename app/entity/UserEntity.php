<?php

namespace app\entity;

use app\trait\HasValidation;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Rules;

class UserEntity extends BaseEntity
{
    use HasValidation;

    public function __construct(
        public mixed $name,
        public mixed $password,
        public mixed $email,
    ) {}

    public function validateName()
    {
        try {
            (new Rules\AllOf(
                new Rules\Alnum(),
                new Rules\NoWhitespace(),
                new Rules\Length(1, 255)
            ))->assert($this->name);
        } catch (ValidationException $e) {
            $this->validationResult['name'] = $e->getMessage();
        }

        return $this;
    }

    public function validatePassword($isCreate = true)
    {
        try {
            (new Rules\AllOf(
                $isCreate ? new Rules\NotEmpty() : new Rules\Optional(new Rules\Alnum()),
                new Rules\NoWhitespace(),
                new Rules\Length($isCreate ? 1 : 0, 255)
            ))->assert($this->password);
        } catch (ValidationException $e) {
            $this->validationResult['password'] = $e->getMessage();
        }

        return $this;
    }

    public function validateEmail()
    {
        try {
            $validation = (new Rules\AllOf(
                new Rules\Email(),
                new Rules\NoWhitespace(),
                new Rules\Length(1, 255)
            ))->assert($this->email);
        } catch (ValidationException $e) {
            $this->validationResult['email'] = $e->getMessage();
        }

        return $this;
    }
}
