<?php
include_once 'conn/conn.php';
if ($_GET['action']=="update"){
    $sqlstr1 = "select * from tb_demo01 where id=".$_GET['id'];
    $result = mysqli_query($conn, $sqlstr1);
    $myrow = mysqli_fetch_row($result); 
}
?>
<form name="form2" method="post" action="update_ok.php">
<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="<?php echo $myrow[0]?>">
<table width="450" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
<tr>
<td align="center">书名：<input name="name" type="text" value="<?php echo $myrow[1]; ?>"></td>
</tr>
<tr>
<td align="center">价格：<input name="price" type="text" value="<?php echo $myrow[2]; ?>"></td>
</tr>
<tr>
<td align="center">出版时间：<input name="date" type="text" value="<?php echo $myrow[3]; ?>"></td>
</tr>
<tr>
<td align="center">所属类别：<input name="type" type="text" value="<?php echo $myrow[4]; ?>"></td>
</tr>
<tr>
<td align="center"><input name="submit" type="submit" value="修改"></td>
</tr>
<tr>
<td align="center"><input name="reset" type="reset" value="重置"></td>
</tr>
</table>
</form>

