<?php

namespace Core;

class Validation {
    private array $data = [];
    private array $rules = [];
    private array $errors = [];
    private array $callbacks = [];

    public function __construct(array $data, array $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(): bool {
        foreach ($this->rules as $field => $fieldRules) {
            $rules = explode('|', $fieldRules);

            foreach ($rules as $rule) {
                $this->applyRule($field, $rule);
            }
        }

        return empty($this->errors);
    }

    public function addCallback(string $name, callable $callback): self {
        $this->callbacks[$name] = $callback;
        return $this;
    }

    public function errors(): array {
        return $this->errors;
    }

    private function applyRule(string $field, string $rule): void {
        [$ruleName, $parameter] = explode(':', $rule . ':') + [null, null]; // Split rule and parameter

        $value = $this->data[$field] ?? null;

        if (isset($this->callbacks[$ruleName])) {
            $callback = $this->callbacks[$ruleName];
            $result = $callback($value, $parameter, $this->data);

            if ($result !== true) {
                $this->addError($field, $result);
            }
        } else {
            switch ($ruleName) {
                case 'required':
                    if (empty($value)) {
                        $this->addError($field, "{$field} is required.");
                    }
                    break;

                case 'required_file':
                    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
                        $this->addError($field, "The file {$field} is required.");
                    }
                    break;

                case 'mimes':
                    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                        $allowedTypes = explode(',', $parameter);
                        $fileType = mime_content_type($_FILES[$field]['tmp_name']);
                        if (!in_array($fileType, $allowedTypes)) {
                            $this->addError($field, "{$field} must be one of the following types: {$parameter}.");
                        }
                    }
                    break;

                case 'max_size':
                    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                        $maxSize = (int)$parameter * 1024; // Convert KB to bytes
                        if ($_FILES[$field]['size'] > $maxSize) {
                            $this->addError($field, "{$field} must not exceed {$parameter} KB.");
                        }
                    }
                    break;

                case 'min':
                    if (strlen($value) < (int)$parameter) {
                        $this->addError($field, "{$field} must be at least {$parameter} characters.");
                    }
                    break;

                case 'max':
                    if (strlen($value) > (int)$parameter) {
                        $this->addError($field, "{$field} must not exceed {$parameter} characters.");
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError($field, "{$field} must be a valid email address.");
                    }
                    break;

                case 'numeric':
                    if (!is_numeric($value)) {
                        $this->addError($field, "{$field} must be numeric.");
                    }
                    break;

                case 'match':
                    if ($value !== ($this->data[$parameter] ?? null)) {
                        $this->addError($field, "{$field} must match {$parameter}.");
                    }
                    break;

                default:
                    break;
            }
        }
    }

    private function addError(string $field, string $message): void {
        $this->errors[$field] = $message;
    }
}
