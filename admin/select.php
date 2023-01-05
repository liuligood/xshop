<table width="700" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB" class="table">
<a href = index.php>添加数据</a>
	<tr>
	<td  width="25">ID</td>
	<td align="center" >图书名称</td>
	<td align="center">价格</td>
	<td align="center">出版日期</td>
	<td align="center">类型</td>
	</tr> 
	</table>
<?php
    include_once 'conn/conn.php';   
    $sql = "select * from tb_demo01";
    $result = mysqli_query($conn, $sql);
    while ($myrow = mysqli_fetch_array($result)){
?>
<table width="700"  align="center" cellspacing="1" bgcolor="#BBBBBB" class="table">
	<tr>
	<td  align="left" width="25" height="20"  bgcolor="#DDDDDD" class="STYLE2"><?php echo $myrow[0]?></td>
	<td  align="left" height="20"  bgcolor="#DDDDDD" class="STYLE2"><?php echo $myrow[1]?></td>
	<td  align="left" height="20"  bgcolor="#DDDDDD" class="STYLE2"><?php echo $myrow[2]?></td>
	<td  align="left"height="20" 	bgcolor="#DDDDDD" class="STYLE2"><?php echo $myrow[3]?></td>
	<td  align="left"   bgcolor="#DDDDDD" class="STYLE2"><?php echo $myrow[4]?></td>
	</tr>
	<?php 
	   echo "<tr>";
	   echo "<td class = 'STYLE2'><a href=update.php?action=update&id=".$myrow[0].">修改</a>/<a href=delete.php?action=delete&id=".$myrow[0]." onclick='return del();'>删除</a></td>";
       echo "</tr>";	
    ?>
</table>
<?php 
    }  
    mysqli_free_result($result);
    mysqli_close($conn);
?>