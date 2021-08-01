<?php


//session 
session_start();

//require
require ("classes/db.php") ;
require_once("classes/post.php");
// $current_user = $_COOKIE['id'];

//db connection
$conn=new db();

//add post
if (isset($_POST['addPost'])){
    $post = new post();

    validateImg($_FILES['postImg']);

    $post->body = $_POST['body'];
    $post->date = date("Y-m-d H:i:s");    ;
    $post->image = $_FILES['postImg']['name'];
   //  $postUserID = $conn->getData("User_Id","users","Username=$current_user")->fetch(PDO::FETCH_ASSOC) ; //$_COOKIE['username'];

   //  var_dump($postUserID['User_Id']);

    $conn->insertData("posts","
    Body='{$post->body}',  
    Date='{$post->date}',
    Image='{$post->image}',
    User_Id= {$_COOKIE['userid']}");

     //redirect to view page
     if($conn->getConnection()->lastInsertID()==0){
        echo "........error........ " ;
     }else{
        header("Location:index.php");
     }//end of redirect 
    
    }elseif(isset($_POST['EditPost'])){
       echo "hell";
    $post = new post();
    validateImg($_FILES['EdittedPostImg']);

    $post->body = ucfirst($_POST['body']);
    // $post->date = $_POST['date'];
    $post->image = $_FILES['EdittedPostImg']['name'];

    var_dump($post);

    $conn->updateData("posts","
    Body='{$post->body}',  
    Image='{$post->image}'",
    "Post_Id = '{$_POST['id']}'");

    header("Location:index.php");
}

//validate images
function validateImg($img){
    $extypesion = pathinfo($img['name'],PATHINFO_EXTENSION );
    $type_arr = ['png','jpg','jpeg'];
    
    if(in_array($extypesion,$type_arr)){
       move_uploaded_file($img['tmp_name'],"images/".$img['name']); 
    }else{
       echo "Enter valid image ... " ;
    }   
 }


?>
