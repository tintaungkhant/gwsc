<?php

namespace App\Utils;

class Validator
{
    protected $data;
    protected $rules;
    protected $errors = [];

    public function __construct($data, $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $singleRule) {
                $this->applyRule($field, $singleRule);
            }
        }

        return empty($this->errors);
    }

    protected function applyRule($field, $rule)
    {
        $value = $this->data[$field];

        switch ($rule) {
            case 'required':
                if (empty($value)) {
                    $this->addError($field, "The $field field is required.");
                }
                break;

            default:
                break;
        }
    }

    protected function addError($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
