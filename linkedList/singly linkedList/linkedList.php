<?php
interface linkedListInterface{
    //head
    //memory
    function printList();
    function pushFront($data);
    function delete($inputValue);
    function pushBack($data);
    function reverse();
    function clearList();
}
interface listNodeInterface{
    //data
    //next
    function getData();
    function setData($inputValue);
    function getNext();
    function setNext($inputValue);
}
class linkedList implements linkedListInterface{
    private $head = 0;
    private $length = 0;
    private $memory = array();
    function printList(){
        if($this->length ==0){
            return 0;
        }
        else{
            $currentNode = $this->head;
         while(true){
            print_r($this->memory[$currentNode]);
            $currentNode = $this->memory[$currentNode]->getNext();
            if($currentNode === "nullPtr"){
            break;
                }
            }
            print "<br>";
        }
    }
    function pushFront($data){
        if($this->length == 0){
            $newNode = new listNode();
            $newNode->setData($data);
            array_push($this->memory,$newNode);
            $this->length++;//1
        }
        else{
            $newNode = new listNode();
            $newNode->setData($data);
            $newNode->setNext($this->head);
            array_push($this->memory,$newNode);
            $this->head = $this->length;
            $this->length++;
        }
    }
    function delete($inputValue){
        if($this->length ==0){
            return 0;
        }
        else{
            $prevMaxNext = null;//前個節點的位置
            $currentNode = $this->head;//當前節點的位置
         while(true){
                if($currentNode==="nullPtr"){
                    break;
                }
                elseif($this->memory[$currentNode]->getData() == $inputValue){
                    if($currentNode==$this->head){//如果該節點是第一個，就把head指向該節點的next
                        $this->head = $this->memory[$currentNode]->getNext();
                    }
                    else{
                        $this->memory[$prevMaxNext]->setNext($this->memory[$currentNode]->getNext());//將該節點的前一節點的Next指向
                    }
                    $this->length--;
                    break;
                }
                $prevMaxNext = $currentNode;
                $currentNode = $this->memory[$currentNode]->getNext();
            }
            print "<br>";
        }
    }
    function pushBack($data){
        if($this->length == 0){
            $newNode = new listNode();
            $newNode->setData($data);
            array_push($this->memory,$newNode);
            $this->length++;//1
        }
        else{
            foreach($this->memory as $currentNode){
                if($currentNode->getNext() == "nullPtr"){
                    $currentNode->setNext($this->length); //將該Node的next指摽指向newNode在陣列（假記憶體）的位置;
                    $newNode = new listNode();
                    $newNode->setData($data);
                    array_push($this->memory,$newNode);
                    $this->length++;
                    break;
                }
            }
        }
    }
    function reverse(){
        if($this->length == 0||$this->length == 1){
            return 0;
        }
        $currentNode = $this->head;
        $prevNode = "null";
        while(true){
            $nextNode = $this->memory[$currentNode]->getNext();
            if($nextNode === "nullPtr"){
                $this->memory[$this->head]->setNext("nullPtr");
                $this->head = $currentNode;
                $this->memory[$currentNode]->setNext($prevNode);
                break;
            }
            if($prevNode !== "null"){
                $this->memory[$currentNode]->setNext($prevNode);
            }
            $prevNode = $currentNode;
            $currentNode = $nextNode;
        }
    }
    function clearList(){
        array_splice($this->memory,0,$this->length);
        $this->length = 0;
        $this->head = 0;
    }
}
class listNode implements listNodeInterface{
    private $data = "";
    private $next = "nullPtr";
    function getData(){
        return $this->data;
    }
    function setData($inputValue){
        $this->data = $inputValue;
    }
    function getNext(){
        return $this->next;
    }
    function setNext($inputValue){
        $this->next = $inputValue;
    }
}
$bug = new linkedList();
$bug->pushBack("1");
$bug->printList();

$bug->pushBack("2");
$bug->printList();

$bug->pushBack("3");
$bug->printList();

// $bug->pushFront("4");
// $bug->printList();

// $bug->delete("2");
// $bug->printList();
$bug->reverse();
$bug->printList();

// $bug->clearList();
// $bug->printList();
