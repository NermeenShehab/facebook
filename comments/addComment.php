<?php
    
    require_once"../classes/db.php";
    require_once"../classes/comment.php";
    
    
    $post_id= $_GET['post_id'];
    $user_id = $_GET['user_id'];

    echo $post_id;
    
    if (isset($_POST['add_comment'])){
        $comment = new comment();
     
        $comment->body = $_POST['body'];
        $comment->date = date("Y-m-d H:i:s");
    
        $conn=new db();
        $conn->getConnection();
        
        
       $result = $conn->insertData("comments","
       Body='{$comment->body}',  
       Date='{$comment->date}',
       Post_Id= '{$post_id}',
       User_Id= {$user_id}");

       
     
        //redirect to view page
        if($conn->getConnection()->lastInsertID()==0){
           echo "........error........ " ;
        }else{
           header("Location:../post.php?id=$post_id");
         }//end of redirect 
     }


?>