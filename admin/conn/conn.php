<?php
/*
 * 连接数据库数据表的具体代码
 */
    $conn = mysqli_connect("localhost","root","root","datebase") 
    or ("数据库连接失败".mysqli_error($conn));  
    mysqli_query($conn, "set names utf8");
?>
