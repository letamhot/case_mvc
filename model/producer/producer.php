<?php

namespace Model;

class Producer
{
    // public $id;
    public $name_producer;
    public $address;
    public $phone;
    public $tax_code;
    public $image;




    public function __construct($name_producer, $address, $phone, $tax_code, $image)
    {
        // $this->id = $id;
        $this->name_producer = $name_producer;
        $this->address = $address;
        $this->phone = $phone;
        $this->tax_code = $tax_code;
        $this->image = $image;


    }
}