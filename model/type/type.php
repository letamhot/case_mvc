<?php

namespace Model;

class Type
{
    // public $id;
    public $name_type;
    public $image;



    public function __construct($name_type, $image)
    {
        // $this->id = $id;
        $this->name_type = $name_type;

        $this->image = $image;

    }
}