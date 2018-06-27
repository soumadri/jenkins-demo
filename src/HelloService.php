<?php
namespace Service;

class HelloService{
    public function sayHello(String $name){
        return "Welcome ".$name;
    }
}