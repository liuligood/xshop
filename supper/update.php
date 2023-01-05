<?php include 'gouwu1.php';?>
<?php 
    include_once 'conn/conn.php';
    if ($_GET['action'] == "update"){
        $sqlstr1 = "select * from tb_dingdan where id=".$_GET['id'];
        $result = mysqli_query($conn, $sqlstr1);
        $row = mysqli_fetch_row($result);
    }
?>
<form name="form2" method="post" action="update_ok.php">
<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="<?php echo $row[0];?>">
	<table  width="503" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
		<tr>
			<td height="46" colspan="2" bgcolor="#DDDDDD">
			<font color="#333333" size="+2">修改订单</font>
			</td>
		</tr>
		<tr>
			<td width="82" height="20" align="right" bgcolor="#DDDDDD">订单号：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="dingdanhao" value="<?php echo $row[1];?>">
			</td>
		</tr>
		<tr>
			<td width="20" height="20" align="right" bgcolor="#DDDDDD">下单人：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="xiadanren" value="<?php echo $row[14];?>">
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">订货人：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="shouhuoren" value="<?php echo $row[4];?>">
			</td>
		</tr>
		<tr>
			<td  height="20" align="right" bgcolor="#DDDDDD">金额总计：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="total" value="<?php echo $row[16];?>">
			</td>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">付款方式：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="zfff" value="<?php echo $row[11];?>">
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">收货方式：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="shff" value="<?php echo $row[10];?>">
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">订单状态：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="zt" value="<?php echo $row[15];?>">
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD">&nbsp;</td>
			<td bgcolor="#DDDDDD"><input type="submit" name="submit" value="修改">
			<input type="reset" name="submit1" value="重置">
			</td>
		</tr>
	</table>
</form>