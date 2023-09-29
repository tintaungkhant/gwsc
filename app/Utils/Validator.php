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
                $this->applyRule($field, $singleRule, in_array("nullable", $rules));
            }
        }

        return empty($this->errors);
    }

    protected function applyRule($field, $rule, $is_nullable)
    {
        $value = $this->data[$field];

        switch ($rule) {
            case 'required':
                if (empty($value)) {
                    $this->addError($field, "The $field field is required.");
                }
                break;

            case 'image':
                if($is_nullable && empty($value["name"])){
                    break;
                }

                $ext = strtolower(pathinfo($value["name"])["extension"]);
                if(!in_array($ext, ["png", "jpg"])){
                    $this->addError($field, "The $field field must be png or jpg");
                }

                if($value["size"] > 4096 * 1024){
                    $this->addError($field, "The $field field must be less than 4mb");
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
