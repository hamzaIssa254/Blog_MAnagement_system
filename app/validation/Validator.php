<?php

class Validator {
    private $errors = [];

    // validate if a field is not empty
    public function validateRequired($field, $value, $message = '') {
        if (empty($value)) {
            $this->errors[$field] = $message ?: "$field is required.";
        }
    }

    //validate the length of a string
    public function validateStringLength($field, $value, $minLength, $maxLength, $message = '') {
        $length = strlen($value);
        if ($length < $minLength || $length > $maxLength) {
            $this->errors[$field] = $message ?: "$field must be between $minLength and $maxLength characters.";
        }
    }
   //sanitize input with stripslashes and htmlspecialchars
   public function validate($data)
   {
       // Trim white spaces from the beginning and end
       $data = trim($data);
       
       // Remove backslashes
       $data = stripslashes($data);
       
       // Convert special characters to HTML entities to prevent XSS
       $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
       
       return $data;
   }
   

   

    // Method to check if validation passed
    public function passes() {
        return empty($this->errors);
    }

    // Method to get all errors
    public function getErrors() {
        return $this->errors;
    }
}
