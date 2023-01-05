<?php 
for ($i = 1;$i<6;$i++){
    $z = 5-$i;
    for ($j = 0;$j<$i;$j++){
        echo "*";
        //echo "*";
    }
    echo "<br>";
}
for ($i = 1;$i<6;$i++){
    for ($j = 5;$j>$i;$j--){
        echo "*";
    }
    echo "<br>";
}
?>