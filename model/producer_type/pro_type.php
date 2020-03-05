<?php

namespace Model;

class Producer_Type
{
    public $id_producer;
    public $name_producer;
    public $id_type;
    public $name_type;
    public $amount;


    public function __construct($id_producer,$name_producer =null, $id_type, $name_type =null, $amount = null)
    {
        $this->id_producer = $id_producer;
        $this->name_producer = $name_producer;
        $this->id_type = $id_type;
        $this->name_type = $name_type;
        $this->amount = $amount;
    }
}