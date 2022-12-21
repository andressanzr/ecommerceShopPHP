<?php

class Person
{
    public $name = "Michel";
    public $city = "Berlin";
    public function __toString()
    {
        return $this->name . " " . $this->city;
    }
    public static function salute()
    {
        echo "Hello";
    }
}



$dog = new Person;


Person::salute();
