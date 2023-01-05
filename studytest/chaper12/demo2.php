<?php
    class Vehicle{
        var $speed;
        var $size;
        public function __construct($speed,$size){
            $this->speed=$speed;
            $this->size=$size;
        }
        function move($size){
            echo "这辆车移动的距离是:".$size."公里";
        }
        function setSpeed($speed){
            $this->speed=$speed;
            echo "现在这辆车的速度是:".$this->speed;
        }      
    } 
    $car  = new Vehicle(120, 5);
    echo $car->setSpeed(110);
    echo "<br>";
    echo $car->move(80);
?>