<?php

abstract class Shape
{
    abstract public function Draw();

    abstract public function Area();
}

class Square extends Shape
{
    public $side = 0;
    public function Draw()
    {
        echo "Draw Square";
    }

    public function Area()
    {
        return $this->side * $this->side;
    }
}

class Rectangle extends Shape
{
    public $width;
    public $height;
    public function Draw()
    {
        echo "Draw Rectangle";
    }

    public function Area()
    {
        return $this->width * $this->height;
    }
}

$rec = new Rectangle();
$rec->Draw();
$rec->width = 100;
$rec->height = 50;
echo "<br> Area: " . $rec->Area() . "<br>";

$sqr = new Square();
$sqr->Draw();
$sqr->side = 100;
echo "<br> Area: " . $sqr->Area() . "<br>"
    ?>