<?php
namespace Service;

class HelloService{
    public function sayHello(String $name){
        if($name == ""){
            return "Hello Unknown";
        }
        else{
            return "Hello ".$name;
        }
    }
}