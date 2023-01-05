<?php
class Car{
    public $a = 1;
    public $b = 2;
    public $c = 3;
    
    public function Tu($a){
        echo $a;
    }
}
    class ax extends Car{
        
        public function aaa(){
            $a =  $this->Tu(1) + 90;
            echo parent::Tu($a);
        }
    }
    
    $a = new ax();
    $a->aaa();
?>