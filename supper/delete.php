<?php include 'gouwu1.php';?>
<?php
    include_once 'conn/conn.php';
    while (list($value,$name)=each($_POST)){
        $sqlstr1 = "delete from tb_dingdan where id='".$value."'";      //执行删除操作
        $result = mysqli_query($conn, $sqlstr1);      
    }
    echo "<script>alert('删除成功');location='index.php';</script>";
    
?>