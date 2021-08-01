<div class="form-popup" id="myForm">
    <form method="POST" action="./PostController.php" class="form-container" enctype="multipart/form-data">
        <h1>Add your Post</h1>
        <label for="post"><b>Post</b></label>
        <textarea class="form-control" placeholder="Leave a Post here" name="body" id="post" style="height: 100px"></textarea>
        <label for="image"><b>Image</b></label>
        <input type="file" name="postImg">
        <button type="submit" class="btn" name="addPost">Add</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
