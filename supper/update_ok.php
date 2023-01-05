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
        echo "订单中的任何信息都不能为空。单击<a href ='javascript:onclick=history.go(-1)'>这里</a>返回";
    }else{
        $sqlstr1 = "update tb_dingdan set dingdanhao='".$dingdanhao."',xiadanren='".$xiadanren."',shouhuoren='".$shouhuoren."',total='".$total."',zfff='".$zfff."',shff='".$shff."',zt='".$zt."'where id =".$_POST['id'];
        $reslut = mysqli_query($conn, $sqlstr1);
        if($reslut){
            echo "修改成功,点击<a href = 'index.php'>这里</a>查看";
        }else{
            echo "修改失败".$sqlstr1;
        }
    }
?>