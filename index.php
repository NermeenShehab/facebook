<?php
    if (!isset($_COOKIE['userid'])){
        header("location:login.php");
    } 

    include "Layouts/htmlHeader.php";
?>
<body>
    
<div class="container">
    <div class="form-php row">
        <?php require("post/addpost.php");?>
        
    </div>
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
        <div class="col-md-8 col-xl-6 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <?php require("post/listpost.php")?>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
       
    </div>
</div>
</div>

<script src="Layouts/js/popup.js"></script>
</body>
</html>
