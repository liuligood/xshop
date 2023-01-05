<?php
   include_once 'conn/conn.php';
   $name = $_POST['name'];
   $price = $_POST['price'];
   $date = $_POST['date'];
   $type = $_POST['type'];
   if (!($name and $price and $date and $type)){
       echo "输入不允许为空。单击<a href ='javascript:onclick=history.go(-1)'>这里</a>返回";
   }else{
      $sqlstr1 = "update tb_demo01 set name='".$name."',price='".$price."',date='".$date."',type='".$type."'where id = ".$_POST['id'];
      $result = mysqli_query($conn, $sqlstr1);
      if ($result){
          echo "修改成功,点击<a href='select.php'>这里</a>查看";
      }else {
          echo "修改失败.<br>$sqlstr1";
      }
   }
?>