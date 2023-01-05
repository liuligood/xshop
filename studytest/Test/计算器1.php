<form name="form1" method="post" action="">
<table>
	<tr>
		<td>第一个数：<input name="num1" type="text" value="<?php echo $_POST['num1']?>"></td>
	</tr>
	<tr>
		<td>
			<select name="sign">
		<option value="+" <?php echo $_POST['sign']=="+" ? "selected" : "" ?>>+</option>
		<option value="-">-</option>
		<option value="*">*</option>
		<option value="/">/</option>
			</select>
		</td>
	</tr>
	<tr>
	<td>第二个数：<input name="num2" type="text" value="<?php echo $_POST['num2']?>"></td>
	</tr>
	<tr><td><input name="submit" type="submit" value="="></td></tr>	
</table>
</form>
<?php
    if (isset($_POST['submit'])){
        $sum = 0;
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $switch = $_POST['sign'];
        if ($num1 == "" && $num2 == ""){
            echo "两个数都不能为空";
        }else{
        switch ($switch){
            case "+":
                $sum = $num1+$num2;
                echo "两个数相加的结果为：".$sum;
                break;
            case "-":   
                $sum = $num1-$num2;
                echo "两个数相减的结果为：".$sum;
                break;
            case "*":
                $sum = $num1*$num2;
                echo "两个数相乘的结果为：".$sum;
                break;
            case "/":
                if($num1 == 0){
                    echo "被除数不能为零";
                }else {
                     $sum = $num1/$num2;
                echo "两个数相除的结果为：".$sum;
                break;  
                }                       
            default: echo "输入错误";
        }
    }
    }
?>