<?php
namespace Haa\framework;

class Validator
{
    protected $data = [];

    protected $registered_validators = [
                                        'email'       => 'isEmailValid',
                                        'psw'  =>   'isPasswordValid',
                                        'login' => null,
                                        
                                    ];


    protected $errors = [];

    public function __construct(array $post_data)
    {
        if (empty($post_data)) {
            trigger_error('Validator initialized with empty data set', E_USER_WARNING);
        }
        $this->data = $post_data;
    }

    public function validate() : bool
    {
        // Validation was done on the client side so no need to validate here
        if (isset($this->data['validation_done_by_js']) && 
            ($this->data['validation_done_by_js'])) {
                return true;
        }

        if (empty($this->data)) {
            trigger_error('No data received for validation', E_USER_WARNING);
            return true;
        }
        foreach($this->data as $key=>$value) {
            // if there is no registered validation method
            if (!array_key_exists($key, $this->registered_validators)) {
                $warning_msg = 'Form field ' . $key . ' has no registered validator method. Validation not done';
                trigger_error($warning_msg, E_USER_WARNING);
                //$this->setErrors($warning_msg);
            }
            else {
                // get the registered validator
                $validator = $this->registered_validators[$key];
                // if validator method is null, no validation is required for that variable
                if (is_null($validator)) {
                    continue;
                }
                // check to make sure the method exists before calling it. Issue a warning if it doesn't
                if (!method_exists($this, $validator)) {
                    $warning_msg = 'Form field ' . $key . ' has a registered validator but no corresponding validator method. Validation not done';
                    trigger_error($warning_msg, E_USER_WARNING);
                    //$this->setErrors($warning_msg);
                }
                else {
                    // remember that each validator should update the $errors property
                    // if the data is invalid
                    $this->$validator($value);
                }
            }
        }
        return (empty($this->errors) ? true : false);
    }

    public function getErrors() : array
    {
        return $this->errors;
    }

    protected function setErrors(string $field_name, string $err_msg)
    {
        // abort with an error message if no err_msg was passed :-)
        if (empty($err_msg)) {
            trigger_error('Cannot create an empty error message', E_USER_ERROR);
        }
        if (empty($field_name)) {
            trigger_error('Invalid field name used. Cannot be empty', E_USER_ERROR);
        }
        $this->errors[$field_name] = $err_msg;
    }


    protected function isEmailValid(string $email)
    {
        if (empty($email)) {
            $this->setErrors('email', 'No value given for Email');
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setErrors('email', 'Invalid email format');
            return false;
        }
        return true;
    }


    protected function isPasswordValid (string $psw)
    {
        if (empty($psw)) {
            $this->setErrors('psw', 'No value given for Password');
            return false;
        }

        if((strlen($psw) < 8) && (strlen($psw) >16) )
        {
            $this->setErrors('psw', 'Invalid Password Format');
            return false;
        }
        return true;
    }


}