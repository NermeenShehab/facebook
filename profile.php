<?php
if (!isset($_COOKIE['userid'])){
    header("location:login.php");
} 
    include "Layouts/htmlHeader.php";
?>

</head>
<body>
<div class="container">
<div class="profile-page tx-13">
    <?php 

        include"Layouts/header.php";
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
                    include "Designs/viewProfile.php";
                } else if($_GET['action'] == 'edit'){
                    include "Designs/editProfile.php";
                } 
            ?>
        <!-- middle wrapper end -->
       
    </div>
</div>
</div>

<script type="text/javascript">

</script>
</body>
</html>