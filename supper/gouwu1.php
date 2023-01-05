<?php
    session_start();
    if (!isset($_SESSION['user'])){
       echo "<script>alert('请先登录后在进行查询订单！');window.location.href='denglu.php'</script>";
       exit();
    }
?>
