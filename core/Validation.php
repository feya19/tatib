<?php

namespace Core;

class Validation {
    private array $data = [];
    private array $rules = [];
    private array $errors = [];
    private array $callbacks = [];

    /**
     * Constructor to initialize data and rules.
     */
    public function __construct(array $data, array $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * Run the validation process.
     */
    public function validate(): bool {
        foreach ($this->rules as $field => $fieldRules) {
            $rules = explode('|', $fieldRules);

            foreach ($rules as $rule) {
                $this->applyRule($field, $rule);
            }
        }

        return empty($this->errors);
    }

    /**
     * Add a custom callback for validation.
     */
    public function addCallback(string $name, callable $callback): self {
        $this->callbacks[$name] = $callback;
        return $this;
    }

    /**
     * Get validation errors.
     */
    public function errors(): array {
        return $this->errors;
    }

    /**
     * Apply a validation rule to a specific field.
     */
    private function applyRule(string $field, string $rule): void {
        [$ruleName, $parameter] = explode(':', $rule . ':') + [null, null]; // Split rule and parameter

        $value = $this->data[$field] ?? null;

        // Check if it's a built-in rule or callback
        if (isset($this->callbacks[$ruleName])) {
            $callback = $this->callbacks[$ruleName];
            $result = $callback($value, $parameter, $this->data);

            if ($result !== true) {
                $this->addError($field, $result); // Use the returned error message
            }
        } else {
            // Built-in rules
            switch ($ruleName) {
                case 'required':
                    if (empty($value)) {
                        $this->addError($field, "{$field} is required.");
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
                    // Unknown rule
                    break;
            }
        }
    }

    /**
     * Add an error message for a specific field.
     */
    private function addError(string $field, string $message): void {
        $this->errors[$field] = $message;
    }
}
