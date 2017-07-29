<?php
namespace Devlife\Services;

use Devlife\Exceptions\FormValidationException;

class Validator extends \Valitron\Validator
{
    public function perform()
    {
        if(!$this->validate())
            throw new FormValidationException($this->errors());
    }
}