<?php
namespace App;

class Validator
{
    private array $data;
    private array $errors;
    public function __construct(array $data){
        $this->data = $data;
        $this->errors = [];
    }

    public static function make(array $data = [], array $rules = []){
        return (new Validator($data))->run($rules);
    }
    public function run(array $rules = []){
        // 'required'
        // ['required']
        foreach($rules as $field => $handler){
            if(is_array($handler)){
                foreach($handler as $handle){
                    [$func, $params] = $this->parseHandler($handle);
                }
            }else{
                [$func, $params] = $this->parseHandler($handler);
            }
            call_user_func([$this, $func], $field, ...$params);
        }
        return $this->errors;
    }

    public function parseHandler($handler){
        $handlerArray = explode(':', $handler); // [function, params, params]
        $handler = $handlerArray[0];
        unset($handlerArray[0]);
        return [$handler, $handlerArray];
    }

    public function test($field, $cond, $message = "Invalid data"){
        if($cond){
            $this->errors[$field] = $message;
        }
    }

    public function required($field){
        $this->test(
            $field, 
            empty($this->data[$field]), 
            "$field is required"
        );
    }

    public function min($field, $value){
        $this->test(
            $field, 
            strlen($this->data[$field]) < $value, 
            "$field must be upto $value characters"
        );
    }

    public function max($field, $value){
        $this->test(
            $field, 
            strlen($this->data[$field]) > $value,
            "$field must not be lengthier than $value"
        );
    }

    public function email($field){
        $this->test(
            $field,
            !filter_var($this->data[$field], FILTER_VALIDATE_EMAIL),
            'invalid email'
        );
    }
}