<?php 

$numbers = [2,3,4];
$numbers = array_unique($numbers);
$target = 6;
$copy = $numbers;
foreach ($numbers as $key => $v){
    unset($copy[$key]);
    foreach ($copy as $ckey => $c){
        if ($v + $c == $target){
            $a[] = $key + 1;
            $a[] = $ckey + 1;
        }
    }
}
return $a;
?>