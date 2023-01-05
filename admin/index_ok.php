<?php 
    include_once 'conn/conn.php';  
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    if (!($name and $price and $date and $type)){
        echo "输入不允许为空。单击<a href ='javascript:onclick=history.go(-1)'>这里</a>返回";
    }else {
        $sqlstr1 = "insert into tb_demo01(`name`,`price`,`date`,`type`) values ('$name','$price','$date','$type')";
        $result = mysqli_query($conn, $sqlstr1);     
       if($result){
           echo "添加成功,点击<a href = 'select.php'>这个</a>查看";
       }else{
           echo "添加失败。单击<a href ='javascript:onclick=history.go(-1)'>这里</a>返回";
       }
    }
?>
