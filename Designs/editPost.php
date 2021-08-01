
<div class='col-md-8 col-sm-12 pull-left posttimeline'>

<?php 
// connection
require_once("./classes/db.php");
$conn= new db();

$allPosts=$conn->getAllData("posts","Post_Id={$_GET['id']}");
while($post=$allPosts->fetch(PDO::FETCH_ASSOC)){    
    echo "<div  id='editForm'>
            <form method='post' action='./PostController.php' enctype='multipart/form-data' class='form-container'>
                <h1>Edit your Post</h1>
                <input type='text' name='id' hidden value='{$post['Post_Id']}'></br>
                <label for='post'><b>Post</b></label>
                <textarea class='form-control' name='body' id='EdittedPost' style='height: 100px'>{$post['Body']}</textarea>
                <label for='image'><b>Image</b></label>
                <input type='file' name='EdittedPostImg'>
                <button type='submit' class='btn' name='EditPost' >Edit</button>
            </form>
        </div> 
    ";
}
?>
</div>