<form name="form1" method="post" action="form1.php">
	<table  width="503" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
		<tr>
			<td height="46" colspan="2" bgcolor="#DDDDDD">
			<font color="#333333" size="+2">您的个人信息为:</font>
			</td>
		</tr>
		<tr>
			<td width="82" height="20" align="right" bgcolor="#DDDDDD">姓名：</td>
			<td width="414" height="20"  bgcolor="#DDDDDD">
			<?php echo $_POST['name'];?>
			</td>
		</tr>
		<tr>
			<td width="20" height="20" align="right" bgcolor="#DDDDDD">性别：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php 
			     echo $_POST['sex'];
			?>
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">生日：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php 
			     echo $_POST['year']."年".$_POST['month']."月".$_POST['day']."日";
			?>				
			</td>
		</tr>
		<tr>
			<td  height="20" align="right" bgcolor="#DDDDDD">爱好：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php 
			for ($i = 0;$i<=count($_POST['interest']);$i++){         //因为数组的下层是从0开始的,所以$i必须为1
			         echo $_POST['interest'][$i];
			     }
			?>
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">地址：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php echo $_POST['address'];?>
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">电话：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php echo $_POST['tel'];?>
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">qq：</td>
			<td height="20" bgcolor="#DDDDDD" >
			<?php echo $_POST['qq'];?>
			</td>
		</tr>
		<tr>
			<td height="20" align="right" bgcolor="#DDDDDD">自我评价：</td>
			<td height="20" bgcolor="#DDDDDD">
			<?php echo $_POST['comment'];?>
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