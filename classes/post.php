<?php 
class post {
private  $id ;
private  $body;
private  $image ;
private  $date ;


function __construct (){

}

function __set($key,$data){
    $this->$key = $data ;
}

function __get($key){
    return $this->$key;
}



}
?>