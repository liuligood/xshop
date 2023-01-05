<?php
/*
 * 一维数组
 */
    //用"[ ]"标识符创建
    $names[0] = "小";
    $names[1] = "婳";
    $names[2] = "婳";
    $names[3] = "是";
    $names[4] = "个";
    $names[5] = "憨";
    $names[6] = "憨";
    foreach ($names as $names)          //想知道下标的话用print_r
        echo $names;
        echo "<br>";
    //用array函数创建
    $looks = array("可以","这么","写");  //这样会自动给数组的下标
    print_r($looks);
    $books = array(1,2,3);
    print_r($books);
?>