<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            background-image:url(/img/preview.jpg);
        }
        .box1{
            width: 300px;
            height: 400px;
            
            margin: 0 auto;
            padding-top: 10px;
            
        }
        .box2{
            width: 250px;
            height: 90px;
            background: thistle;
            margin-left: 25px;
        }
        .t{
            width: 250px;
            height: 280px;
            margin: 0 auto;
            align-self: center;
            margin-top: 15px;
            text-align: center;
        }
        .box3{
            
            background-color: aliceblue;
            background-image:url(img/preview.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            width: 0 auto;
            height: 720px;
        }
    </style>
</head>
<body background="/img/preview.jpg">
<form action="" name="form1" method="post">
    <div class="box3"><div class="box1">
       <!-- 文本框 -->
    <input name="input" type="text" >
<table class="t">
    <tr>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" class="*" value="乘"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num7" value="7"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num8" value="8"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num9" value="9"></input></td>
    </tr>
    <tr>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="/" value="除"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num4" value="4"></input></td>
        <td><input type="submit"
            style="width: 50px;height: 50px;" name="num5" value="5"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num6" value="6"></input></td>
    </tr>
    <tr>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="+" value="加"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num1" value="1"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num2" value="2"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="num3" value="3"></input></td>
    </tr>
    <tr>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="-" value="减"></input></td>
        <td><input type="submit" 
            style="width: 50px;height: 50px;" name="." value="."></input></td>
        <td colspan="2"><input type="submit" 
            style="width: 100px;height: 50px;" name="=" value="="></input></td>
    </tr>
</table>
    </div>
</div>
</form>
</body>
</html>
