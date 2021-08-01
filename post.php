<?php
  if (!isset($_COOKIE['userid'])){
    header("location:login.php");
} 
  include "Layouts/htmlHeader.php";
?>
<body>
<div class="container">
<div class="profile-page tx-13">
    <?php 

        include "Layouts/header.php";
    ?>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <?php 

            include "Layouts/LeftSide.php";
        ?>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
          <?php
              if(!isset($_GET['action'])){
                include "Designs/viewPost.php";
              } else if($_GET['action'] == 'edit'){
                include "Designs/editPost.php";
              } else if($_GET['action'] == 'add'){
                include "Designs/addPost.php";
              }
          ?>
        <!-- middle wrapper end -->
       
    </div>
</div>
</div>
<script src="Layouts/js/popup.js"></script>

<script type="text/javascript">

</script>
</body>
</html>
