<?php

namespace app\Models;

class Products extends Model
{
    public $id;
    public $code;
    public $name;
    public $level_1;
    public $level_2;
    public $level_3;
    public $price;
    public $price_sp;
    public $quantity;
    public $property_fields;
    public $joint_purchases;
    public $unit_measurement;
    public $picture;
    public $display_main;
    public $description;
}