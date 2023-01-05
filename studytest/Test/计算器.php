<form name="form1" method="post" action="">
<table id="table">
	<tr>
		<td>请输入第一个数：<input name="first" type="text"></td>
	</tr>
	<tr>
		<td>请输入第二个数：<input name="second" type="text" ></td>
	</tr>
	<tr>
		<td><input name="submit"  type="submit" value="+"></td>
	</tr>
	<tr>
		<td><input name="submit"  type="submit" value="-"></td>
	</tr>
	<tr>
		<td><input name="submit"  type="submit" value="*"></td>
	</tr>
	<tr>
		<td><input name="submit" type="submit" value="/"></td>
	</tr>
</table>
</form>
<?php 
    if(isset($_POST['submit']) && $_POST['submit']=="+"){
        $sum = $_POST['first']+$_POST['second']; 
        echo "两个数的相加结果为：".$sum;        
    }
    if(isset($_POST['submit']) && $_POST['submit']=="-"){
        $sum = $_POST['first']-$_POST['second'];
        echo "两个数的相减结果为：".$sum;
    }
    if(isset($_POST['submit']) && $_POST['submit']=="*"){
        $sum = $_POST['first']*$_POST['second'];
        echo "两个数的相乘结果为：".$sum;
    }
    if(isset($_POST['submit']) && $_POST['submit']=="/"){
        if ($_POST['first'] == 0){
            echo "被除数不能为零";
        }else {
        $sum = $_POST['first']/$_POST['second'];
        echo "两个数的相除结果为：".$sum;
        }
    }
?>