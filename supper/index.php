<?php include 'gouwu1.php';?>
<?php
    date_default_timezone_set("Asia/Hong_kong");
    if (!isset($_COOKIE['vist_time'])){
        setcookie("vist_time",date("Y-m-d H:i:s"),time()+60);
        echo "您是第一次访问网站";
    }else {
        setcookie("vist_time",date("Y-m-d H:i:s"),time()+60);
        echo "您的上次访问时间为：".$_COOKIE['vist_time'];
    }
?>
<?php 
    include_once 'conn/conn.php';      
?>
<form name="from1" method="post" action="delete.php">
<?php 
    echo "<a href='logout.php'>注销</a>";
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="20" bgcolor="#FFCF60"><div align="center" class="style1">查看订单</div></td>
	</tr>
	<tr>
	<td height="40" bgcolor="#666666">
	<table width="750" height="44" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
	<td width="121" height="20" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
	<td width="59"  bgcolor="#FFFFFF"><div align="center">下单人</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div align="center">订货人</div></td>
	<td width="70"  bgcolor="#FFFFFF"><div align="center">金额总计</div></td>
	<td width="88"  bgcolor="#FFFFFF"><div align="center">付款方式</div></td>
	<td width="87"  bgcolor="#FFFFFF"><div align="center">收货方式</div></td>
	<td width="141" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
	<td width="115" bgcolor="#FFFFFF"><div align="center">操作</div></td>
	<td width="115" bgcolor="#FFFFFF"><div align="center">其他操作</div></td>
	</tr>
	<?php 
	   $pagesize = 5;
	   $sqlstr="select * from tb_dingdan";
	   $total = mysqli_query($conn, $sqlstr);
	   $totalNum = mysqli_num_rows($total);
	   $pagecount = ceil($totalNum/$pagesize);
	   (!isset($_GET['page']))?($page=1):$page = $_GET['page'];
	   ($page<=$pagecount)?$page:($page = $pagecount);
	   $sqlstr1 = "select * from tb_dingdan limit " . (($page - 1) * $pagesize) . "," . $pagesize;
	   $result = mysqli_query($conn, $sqlstr1);
	   while ($row = mysqli_fetch_array($result)){	
	       
	?>
	<tr>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[1]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[14]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[4]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[16]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[11]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[10]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center"><?php echo $row[15]?></div></td>
	<td height="21"  bgcolor="#FFFFFF"><div align="center">
	<input type="checkbox" name=<?php echo $row[0];?> value=<?php echo $row[0]?>></div></td>
	<?php 
	   echo "<td height='21' bgcolor='#FFFFFF'><div align='center'>
            <a href=update.php?action=update&id=".$row[0].">修改</a></td>";
	?>
	</tr>	
	<?php 
	   } 
	?>
	</table></td>
	</tr>
	<tr>
	<td height="25" colspan="6" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;
	<?php 
	   echo "共".$totalNum."本图书&nbsp;&nbsp;";
	   echo "第".$page."页/共".$pagecount."页&nbsp;&nbsp;";
	   if ($page!=1){
	       echo "<a href='?page=1'>首页</a>&nbsp;";
	       echo "<a href='?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;";
	   }else {
	       echo "首页&nbsp;上一页&nbsp;&nbsp;";
	   }
	   if ($page!=$pagecount){
	       echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;&nbsp;";
	       echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;";
	   }else {
	       echo "下一页&nbsp;尾页&nbsp;&nbsp;";
	   }
	?>
	</td>
	</tr>
</table>  
<table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>	
    	<td><div align="right"><input type="submit" value="删除选择项" class="buttoncss"></div></td>
    </tr>
</table>
</form>
<form name="form2" method="post" action="insert.php">
<table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    	<td><div align="right"><input type="submit" value="添加新订单" class="buttoncss"></div></td> 	    	
    </tr>
    
</table>  
</form>