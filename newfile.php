<?php
/*
 * 给你一个整数数组 coins ，表示不同面额的硬币；以及一个整数 amount ，表示总金额。

计算并返回可以凑成总金额所需的 最少的硬币个数 。如果没有任何一种硬币组合能组成总金额，返回 -1 。

你可以认为每种硬币的数量是无限的。

 */
$arr = array(1,5,10,20,50,100);
$len = count($arr);
$amount = 9798;
for ($i = 0; $i<$len ; $i++ ){
    $sum = $amount / $arr[$i];
    $sum = (int)$sum;  
    if ($sum == 0){
        break;
    }
    $number = $amount % $arr[$i];
    if ($number != 0){
        for ($y = 0; $y<$len ; $y++ ){
            $s = $number/$arr[$y];
            $number = $number % $arr[$y];
            if ($number == 0){
                break;
            }
        }
    }
    $a[] = $sum+$s;
}
var_dump($a);exit();
$min = min($a);
$len1 = count($a);
echo "凑齐需要的最少硬币数为：".$min."\n";
echo "一共有".$len1."个方法凑成总数额";




?>