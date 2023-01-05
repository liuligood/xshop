<?php
    include_once 'conn/conn.php';
    $dingdanhao = $_POST['dingdanhao'];
    $xiadanren= $_POST['xiadanren'];
    $shouhuoren= $_POST['shouhuoren'];
    $total= $_POST['total'];
    $zfff= $_POST['zfff'];
    $shff= $_POST['shff'];
    $zt= $_POST['zt'];
    if (!($dingdanhao and $xiadanren and $shouhuoren and $total and $zfff and $shff and $zt)){
        echo "<script>alert('订单中的任何信息不能为空！');window.location.href='insert.php'</script>";
    }else{
        $sqlstr1 = "insert into tb_dingdan(`dingdanhao`,`xiadanren`,`shouhuoren`,`total`,`zfff`,`shff`,`zt`)
        values('$dingdanhao','$xiadanren','$shouhuoren','$total','$zfff','$shff','$zt')";
        $reslut = mysqli_query($conn, $sqlstr1);
        if($reslut){
            echo "<script>alert('添加成功,点击确定为您跳转');window.location.href='index.php'</script>";
        }else{
            echo "添加失败。单击<a href ='javascript:onclick=history.go(-1)'>这里</a>返回";
        }
    }
    
?>