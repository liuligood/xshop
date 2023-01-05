<?php
    class Round{
        var $r;
        public function S($r){
            return 3.14*$r*$r;
        }
    }
    $big = new Round();
    echo $big->S(10);
    echo "<br>";
    $small = new Round();
    echo $small->S(5);
    echo "<br>";
?>

<?php 
    class Person{
        var $name;
        var $age;
        static $cake = 1000;
        public function __construct($name,$age){
            $this->name = $name;
            $this->age = $age;
        }
        public function eat($num){
            if (self::$cake>=$num){
                self::$cake -=$num;
            }else {
                echo "蛋糕不够吃了";
            }
        }
        public function showCake(){
            echo "当前还剩".self::$cake."个蛋糕";
        }
    }
    $tan = new Person('唐僧', 20);
    $monkey = new Person('悟空', 50);
    $pig = new Person('猪八戒', 200);
    $sMonk = new Person('沙僧', 100);
    for ($i=0;$i<=2;$i++){
        $tan->eat(3);
        $monkey->eat(5);
        $sMonk->eat(9);
        $pig->eat(30);
    }
    $tan->showCake();
    echo "<br>";
?>

<?php 
    class Phone{
        var $brand;
        var $price;
        var $color;
        public function __construct($brand,$price,$color){
            $this->brand = $brand;
            $this->price = $price;
            $this->color = $color;
        }
        public function call(){
            echo "正在使用".$this->brand."价格".$this->price."颜色为：".$this->color."的手机打电话。";
        }
        public function sendMessage(){
            echo "正在使用".$this->brand."价格".$this->price."颜色为：".$this->color."的手机发送短信。";
        }      
    }
    $mi = new Phone("小米11", "5000", "白色");
    $realme = new Phone("真我neo3", "2600", "银色");
    $mi->call();
    echo "<br>";
    $mi->sendMessage();
    echo "<br>";
    $realme->call();
    echo "<br>";
    $realme->sendMessage();
    echo "<br>";   
?>

<?php 
    class GrilFriend{
        var $name;
        var $height;
        var $weight;
        public function __construct($name,$height,$weight){
            $this->name = $name;
            $this->height = $height;
            $this->weight = $weight;
        }
        public function show(){
            echo "我女朋友叫".$this->name."<br>";
            echo "身高:".$this->height."<br>";
            echo "体重:".$this->weight."<br>";
        }
        public function wash(){
            echo "女朋友帮我洗衣服";
        }
        public function cook(){
            echo "女朋友帮我煮饭";
        }
    }
    $girl = new GrilFriend("婳婳", 160, 57);
    $girl->show();
?>