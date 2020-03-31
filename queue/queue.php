<?php

interface queueInterface{
    function getLength();
    function pop();
    function push($value);
    function front();
    function back();  
    // push: 把一個值加到尾巴
    // pop: 把第一個值移除掉
    // back: 得到尾巴的值
    // front: 得到頭的值
}
class queue implements queueInterface{
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
            array_splice($this->container,0,1);
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
    function back(){
        if($this->length==0){
            echo"請存放東西！";
            echo"<br>";
        }
        else{
            print_r($this->container[$this->length-1]);
            echo"<br>";
        }
    }
    function front(){
        if($this->length==0){
            echo"請存放東西！";
            echo"<br>";
        }
        else{
            print_r($this->container[0]);
            echo"<br>";
        }
    }    
}
