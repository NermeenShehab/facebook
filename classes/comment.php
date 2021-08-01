<?php 
class Comment {
private  $comment_id ;
private  $user_id;
private  $post_id;
private  $body;
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