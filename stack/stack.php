<?php
interface stackInterface
{
    function getLength();
    function pop();
    function push($value);
    function top();
    // top: 得到最上面的值
    // push: 再拿一個盤子往上疊
    // pop: 拿掉最上面的盤子    
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
    function top(){
        if($this->length==0){
            echo"請存放東西！";
            echo"<br>";
        }
        else{
            print_r($this->container[$this->length-1]);
            echo"<br>";
        }
    }  
}
$stackA = new stack();
$stackA->getLength();
$stackA->top();
$stackA->push("1");
$stackA->getLength();
$stackA->top();
$stackA->push("2");
$stackA->getLength();
$stackA->top();
$stackA->push("3");
$stackA->getLength();
$stackA->top();
$stackA->pop();
$stackA->getLength();
$stackA->top();
$stackA->pop();
$stackA->getLength();
$stackA->top();
$stackA->pop();
$stackA->getLength();
$stackA->top();
$stackA->pop();
$stackA->getLength();
$stackA->top();