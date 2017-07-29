<?php
namespace Devlife\Exceptions;

class EntityValidationException extends Exception
{
    protected $errors;

    public function __construct($errors, $code = 0)
    {
        $this->errors = $errors;

        $messages = array();

        foreach($errors as $field => $msgs)
            foreach($msgs as $msg)
                $messages[] = $msg;

        parent::__construct(implode(', ', $messages), $code);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}