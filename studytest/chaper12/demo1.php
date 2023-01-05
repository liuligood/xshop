<?php
    class Box{
        var $long;
        var $width;
        var $height;
        public function boxs($long,$width,$height){
            $s =$long*$width*$height;
            echo "立方体的体积为:".$s;
        }
        public function boxzhouchang($long,$width,$height){
            $l = ($long+$width+$height)*4;
            echo "立方体的周长为:".$l;
        }
    }
    $box1 = new Box();
    $box1->boxs(4, 5, 6);
    echo "<br>";
    $box1->boxzhouchang(4, 5, 6);
    echo "<br>";
    
?>
