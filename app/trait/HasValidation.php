<?php

namespace app\trait;

trait HasValidation
{
    public array $validationResult = [];

    public function check(): ?array
    {
        if (count($this->validationResult) > 0) {
            return $this->validationResult;
        }

        return null;
    }
}
