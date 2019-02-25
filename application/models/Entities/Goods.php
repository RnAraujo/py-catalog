<?php
namespace Entities;

class Goods
{
    private $id;
    private $itemCode;
    private $description;
    private $pricetag;

    public function __call($name, $arguments)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}