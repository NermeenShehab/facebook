<?php
  
  $user_id = $_COOKIE['userid'];
?>
<div class='col-md-8 col-sm-12 pull-left posttimeline'>
  <!-- start of post loop -->
  <?php
  //connection
  require_once("./classes/db.php");
  $conn = new db();
  $allPosts = $conn->getAllData("posts", "Post_Id={$_GET['id']}");

  //list all posts
  while ($post = $allPosts->fetch(PDO::FETCH_ASSOC)) {
    $userData = $conn->getData("fname,lname,Profile_Img", "users", "User_Id={$post['User_Id']}");
    $user = $userData->fetch(PDO::FETCH_ASSOC);
    echo "
        <div class='panel panel-default'>
        
        <div class='dropdown pull-right postbtn'>";
        if ($user_id==$post['User_Id']){ echo " 
        <button class='btn p-1' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-horizontal icon-lg pb-3px'>
                <circle cx='12' cy='12' r='1'></circle>
                <circle cx='19' cy='12' r='1'></circle>
                <circle cx='5' cy='12' r='1'></circle>
            </svg>
        </button>
          
        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>
     
            <a class='dropdown-item d-flex align-items-center' href='post.php?id={$post['Post_Id']}&action=edit'>
                    <span class=''>Edit</span></a>
            <a class='dropdown-item d-flex align-items-center' href='deletePost.php?id={$post['Post_Id']}'>
                    <span class=''>Delete</span></a> 
                  
          </div>
          ";};
          echo "
         </div>
         

          <div class='col-md-12  mt-3'>
            <div class='media'>
              <div class='media-left'> <a href='javascript:void(0)'>
               <img src='./images/{$user['Profile_Img']}' alt='profile img' style='width:50px; height:50px; border-radius:50% ;' class='media-object'> </a> </div>
              <div class='media-body'>
                <h4 class='media-heading'>{$user['fname']} {$user['lname']}<br>
                  <small><i class='fa fa-clock-o'></i> {$post['Date']}</small> </h4>
                <p class='mt-3'>{$post['Body']}</p>";
                if($post['Image']){
                  echo "<img class='img-fluid mb-4' src='./images/{$post['Image']}'  width='500' height='250' alt=''>";};
                  echo"   
         
              </div>
            </div>
            
          </div>";
  } ?>
  <!-- End of post loop -->

  <!-- Start of Comment loop -->
  <?php
      
    $post_id = $_GET['id'];
    
    $query = "select users.fname ,users.lname, users.Profile_Img  , comments.Body , comments.Date from users inner join comments on users.User_Id=comments.User_Id where comments.Post_Id = '$post_id' order by date" ;
        
    $result = $conn -> innerJoin($query);
    $result -> execute();

    
   $result = $result ->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $comment){
  ?>
  <div class='col-md-12 commentsblock border-top '>
    <div class='media mt-5 ms-0'>
      <div class='media-left'> <img alt='img' src='images/<?=$comment['Profile_Img']?>' style='width:50px; height:50px; border-radius:50% ;' class='media-object'> </a> </div>
      <div class='media-body'>
        <h4 class='media-heading'><?php echo "{$comment['fname']} {$comment['lname']}"; ?></h4>
        <small> <?= $comment['Date'] ?></small>
        <p class="mt-3"><?= $comment['Body'] ?></p>
      </div>
    </div>

  </div>
  <?php } ?>
  <div class='col-md-12 border-top py-3'>
    <div class='status-upload'>
      <form method='post' action="comments/addComment.php?post_id=<?= $_GET['id'] ?>&user_id=<?= $user_id ?>">
        <label>Add Comment</label>
        <textarea class='form-control' placeholder='Comment here' name='body'></textarea>
        <br>

        <button type='submit' class='btn btn-success pull-right' name='add_comment'> Comment</button>
      </form>
    </div>
    <!-- Status Upload  -->

  </div>
</div>


