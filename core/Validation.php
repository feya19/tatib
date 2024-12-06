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
        [$ruleName, $parameter] = explode(':', $rule . ':') + [null, null]; // Pisahkan nama aturan dan parameter

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
                        $this->addError($field, "{$field} wajib diisi.");
                    }
                    break;

                case 'required_file':
                    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
                        $this->addError($field, "File {$field} wajib diunggah.");
                    }
                    break;

                case 'mimes':
                    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                        $allowedTypes = explode(',', $parameter);
                        $fileType = mime_content_type($_FILES[$field]['tmp_name']);
                        if (!in_array($fileType, $allowedTypes)) {
                            $this->addError($field, "File {$field} harus memiliki tipe: {$parameter}.");
                        }
                    }
                    break;

                case 'max_size':
                    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                        $maxSize = (int)$parameter * 1024; // Konversi KB ke byte
                        if ($_FILES[$field]['size'] > $maxSize) {
                            $this->addError($field, "File {$field} tidak boleh lebih besar dari {$parameter} KB.");
                        }
                    }
                    break;

                case 'min':
                    if (strlen($value) < (int)$parameter) {
                        $this->addError($field, "{$field} harus memiliki setidaknya {$parameter} karakter.");
                    }
                    break;

                case 'max':
                    if (strlen($value) > (int)$parameter) {
                        $this->addError($field, "{$field} tidak boleh melebihi {$parameter} karakter.");
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError($field, "{$field} harus berupa alamat email yang valid.");
                    }
                    break;

                case 'numeric':
                    if (!is_numeric($value)) {
                        $this->addError($field, "{$field} harus berupa angka.");
                    }
                    break;

                case 'match':
                    if ($value !== ($this->data[$parameter] ?? null)) {
                        $this->addError($field, "{$field} harus sama dengan {$parameter}.");
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
