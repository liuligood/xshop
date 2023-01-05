<?php
    include_once 'conn/conn.php';
    if ($_GET['action'] == "delete"){
        $sqlstr = "delete from tb_demo01 where id=".$_GET['id'];
        $result = mysqli_query($conn, $sqlstr);

        if ($result){
            echo "<script>alert('删除成功');location='select.php';</script>";
        }else{
            echo "删除失败";
        }
    }
?>
