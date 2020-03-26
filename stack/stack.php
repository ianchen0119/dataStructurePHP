<?php
interface stackInterface
{
    function getLength();
    function pop();
    function push($value);
    function getStack();    
}
class stack implements stackInterface
{
    private $length = 0;
    private $container = array();
    function getLength(){
        echo "長度為：{$this->length}";
        echo"<br>";
    }
    function pop(){
        if($this->length == 0){
            echo"該容器已無東西！";
            echo"<br>";
        }
        else{
            $this->length--;
            array_pop($this->container);
        }
    }
    function push($value){
        if($value){
            array_push($this->container,$value);
            $this->length++;
        }
        else{
            echo"請存放東西！";
            echo"<br>";
        }
    }
    function getStack(){
        print_r($this->container);
        echo"<br>";
    }  
}
$stackA = new stack();
$stackA->getLength();
$stackA->getStack();
$stackA->push("1");
$stackA->getLength();
$stackA->getStack();
$stackA->push("2");
$stackA->getLength();
$stackA->getStack();
$stackA->push("3");
$stackA->getLength();
$stackA->getStack();
$stackA->pop();
$stackA->getLength();
$stackA->getStack();
$stackA->pop();
$stackA->getLength();
$stackA->getStack();
$stackA->pop();
$stackA->getLength();
$stackA->getStack();
$stackA->pop();
$stackA->getLength();
$stackA->getStack();