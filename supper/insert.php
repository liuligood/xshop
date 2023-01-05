<?php include 'gouwu1.php';?>
<form name="form1" method="post" action="insert_ok.php">
	<table  width="503" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
		<tr>
			<td height="46" colspan="2" bgcolor="#DDDDDD">
			<font color="#333333" size="+2">添加新的订单</font>
			</td>
		</tr>
		<tr>
			<td width="82" height="20" align="right" bgcolor="#DDDDDD">订单号：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="dingdanhao">
			</td>
		</tr>
		<tr>
			<td width="20" height="20" align="right" bgcolor="#DDDDDD">下单人：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="xiadanren">
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">订货人：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="shouhuoren">
			</td>
		</tr>
		<tr>
			<td  height="20" align="right" bgcolor="#DDDDDD">金额总计：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<input type="text" name="total">
			</td>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">付款方式：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="zfff" >
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">收货方式：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="shff" >
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">订单状态：</td>
			<td height="20" bgcolor="#DDDDDD">
			<input type="text" name="zt" >
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD">&nbsp;</td>
			<td bgcolor="#DDDDDD"><input type="submit" name="submit" value="提交">
			<input type="reset" name="submit1" value="重置">
			</td>
		</tr>
	</table>
</form>