<?php

class Product
{
    private $id, $name, $price, $origin, $fotoUrl, $categoryId;

    public function __construct($name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->origin = $origin;
        $this->fotoUrl = $fotoUrl;
        $this->description = $description;
        $this->categoryId = $categoryId;
    }
}
