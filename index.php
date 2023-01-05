
<?php 
/*
 *  这是一个显示图片的程序 ,也是一个多行注释。多行注释是不允许嵌套使用的
 */
    echo '<img src = "images/tupian.jpg" width="100" height="100"/>'; 
    //输出一个图片,在单行注释里不要出现？>符号，会被php认为结束语符号
    
    echo "</br>";
    
   
/*
 * php的基本类型的使用
 */
    //布尔类型的使用
    $a = true;
    if ($a == 'true'){
        echo "<font color='pink'>该程序可以执行</font>";
    }else {
        echo "发生错误";
    }
    echo "</br>";
    //字符串型的使用
    $b = '这是一个字符串';   //如果没什么需求,建议是使用单引号,双引号会多花费一些时间来转义和变量的简析
    echo "$b";
    echo "</br>";
    echo '$b';
    echo "</br>";
    //整型的使用
    $c = 123;        //十进制
    $d = 0123;       //八进制
    $e = 0x123;      //十六进制
    echo "$c.$d.$e";
    echo "</br>";
    
    
/*
 * php的复合类型的使用
 */
    //数组的定义可以为 : $array = array("1","2","3");
    //$array[key] = "value";
    //$array = array(0=>1,1=>2,2=>3)
    $arr = array(0 => "1","az" => "2","shit" => "3");
    echo "$arr[0]";
    echo "$arr[az]";
    echo "$arr[shit]";
    echo "</br>";
 
  
/*
 * php的特殊数据类型的使用
 */
    $f;             //都为null
    $g = null;      
    $h = 10;
    unset($h);     //让该数变成空值
    
    
/*
 * php的检测数据类型的函数使用
 */
    $q = 123;
    $w = "今天又是学习PHP的一天";
    $e = 77.9;
    echo "检测是否为数组：".is_array($arr)."</br>";
    echo "检测是否为整型：".is_int($q)."</br>";
    echo "检测是否为整型：".is_int($w)."</br>";
    echo "检测是否为整型：".is_int($e)."</br>";
    echo "检测是否为浮点型：".is_float($e)."</br>";
    echo "检测是否为字符串：".is_string($w)."</br>";
    echo "检测是否为null：".is_null($g)."</br>";
    
    
    
?>
 <img src="<?php echo ("images/tupian.jpg");?>" width="100">