
<div class="panel panel-default">
    <div class="panel-body">
    <div class="status-upload nopaddingbtm">
        <form action="./PostController.php" method="post" enctype="multipart/form-data">
        <textarea class="form-control" name="body" placeholder="What are you doing right now?"></textarea>
        <br>
        <ul class="nav nav-pills pull-left ">
            <!-- <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li> -->
            <li><label ><b>Image</b></label></li>
            <li><input type="file" name="postImg"></li>

        </ul>
        <button type="submit" name="addPost" class="btn btn-success pull-right" > Share</button>
        </form>
    </div>
    </div>
</div>

<?php 
    //connection
    require_once("./classes/db.php");
    $conn= new db();
    $allPosts=$conn->getAllData("posts");
    $user_id = $_COOKIE['userid'];

    //list all posts
    while($post=$allPosts->fetch(PDO::FETCH_ASSOC)){
    $userData=$conn->getData("fname,lname,Profile_Img","users","User_Id={$post['User_Id']}");
    $user=$userData->fetch(PDO::FETCH_ASSOC);
echo "
    <div class='card rounded mt-5'>
        <div class='card-header'>
            <div class='d-flex align-items-center justify-content-between'>
                <div class='d-flex align-items-center py-2'>
                    <img class='img-xs rounded-circle' src='images/{$user['Profile_Img']}'style='width:50px; height:50px;' alt=''>
                    <div class='ml-2 '>
                    <h4 class='media-heading'>{$user['fname']} {$user['lname']}<br>
                    <small><i class='fa fa-clock-o'></i> {$post['Date']}</small> </h4>
                      </div>
                </div>
                <div class='dropdown'>
                    <button class='btn p-0' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-horizontal icon-lg pb-3px'>
                            <circle cx='12' cy='12' r='1'></circle>
                            <circle cx='19' cy='12' r='1'></circle>
                            <circle cx='5' cy='12' r='1'></circle>
                        </svg>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$post['Post_Id']}'>
                                <span class=''>View Post</span></a>";
                        if ($user_id==$post['User_Id']){ echo "       
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$post['Post_Id']}&action=edit'>
                                <span class=''>Edit</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='deletePost.php?id={$post['Post_Id']}'>
                                <span class=''>Delete</span></a>";};
                                echo "
                    </div>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <p class='mb-3 tx-14'>{$post['Body']}</p>";
            if($post['Image']){
                echo "<img src='images/{$post['Image']}' width='500' height='250' class='mb-4' alt='postImg'> " ;};
                echo"
        </div>
        
        <div class='card-footer'>
            <div class='d-flex post-actions'>
            <a href ='post.php?id={$post['Post_Id']}'>Read More</a>
            </div>
        </div>
    ";
    
    $query = "select users.fname ,users.lname , users.Profile_Img  , comments.Body , comments.Date from users inner join comments on users.User_Id=comments.User_Id where comments.Post_Id ={$post['Post_Id']} order by date " ;
        
    $result = $conn -> innerJoin($query);
    $result -> execute();


   $result = $result ->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $comment){
  echo "
  <div class='col-md-12 commentsblock border-top '>
    <div class='media mt-5 ms-0'>
      <div class='media-left'> 
      <img alt='img' src='images/{$comment['Profile_Img']}' style='width:50px; height:50px; border-radius:50% ;' class='media-object'> 
        </div>
        <div class='media-body'>
        <h4 class='media-heading'>{$comment['fname']} {$comment['lname']}</h4>
        <small> {$comment['Date']} </small>
        <p class='mt-3'>{$comment['Body']}</p>
      </div>
    </div>
  </div>

  
";
  };
  echo "</div> 
  <div class='col-md-12 border-top card rounded mb-5 pt-2'>
  <div class='status-upload'>
    <form method='post' action='comments/addComment.php?post_id={$post['Post_Id']}&user_id=$user_id' >
      
    <label>Add Comment</label>
      <textarea class='form-control' placeholder='Enter Your Comment here' name='body'></textarea>
      <br>

      <button type='submit' class='btn btn-success pull-right mb-5' name='add_comment'> Comment</button>
    </form>
  </div>

</div>";
};  
    
    ?>

    
