<?php
namespace Entities;

class Goods
{
    private $id;
    private $itemCode;
    private $description;
    private $unitMeasurement;
    private $expenseClasifier;
    private $pricetag;
    private $enabled;

    public function __call($name, $arguments)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}