<form name="form1" method="post" action="">
<table border="0">
	<tr>
		<td>用户名:<input name="user" type="text"></td>
	</tr>
	<tr>
		<td>密码    :<input name="pwd" type="password"></td>
	</tr>
	<tr>
		<td>&nbsp;<input name="submit" type="submit" value="登录"></td>
		
	</tr>
	<tr>
		<td>&nbsp;<input name="reset" type="reset" value="重置"></td>		
	</tr>
</table>
</form>
<?php 
    if (isset($_POST['submit']) && $_POST['submit'] == "登录"){
        $pwd = $_POST['pwd'];
        $user = $_POST['user'];
        if (strlen($user)<4){
            echo "用户名不能小于6位";
        }
        if (strlen($pwd)<6){
            echo "密码不能小于6位";
        }
    }
?>