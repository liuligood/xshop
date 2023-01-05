<?php
    $host = "127.0.0.1";
    $userName = "root";
    $password = "root";
    $connID = mysqli_connect($host,$userName,$password);
    $dbName = "datebase";
    if (mysqli_select_db($connID, $dbName)){
        echo "数据连接成功";
    }else{
        echo "数据库连接失败";
    }
?>