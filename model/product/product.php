<?php

namespace Model;

class Product
{
    public $name;
    public $type_product;
    public $producer;
    public $amount;
    public $image;
    public $price_input;


    public function __construct($name, $type_product, $producer, $amount, $image, $price_input)
    {
        $this->name = $name;
        $this->type_product = $type_product;
        $this->producer = $producer;
        $this->amount = $amount;
        $this->image = $image;
        $this->price_input = $price_input;


    }
}