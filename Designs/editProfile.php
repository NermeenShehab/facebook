<?php 
$connection = new PDO("mysql:host=localhost; dbname=Facebook","root","");
$d=$connection->query("select * from users where User_Id={$_GET['id']}");
$updateprofile=$d->fetch(PDO::FETCH_ASSOC);

// var_dump($updateprofile);

?>
        <!-- middle wrapper start -->
        <div class="middle col-8 text-center">
            
        <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
         <div class="row gutters-sm " >
            
                <div class="col-6 mb-3" style="margin: 0 auto;">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="images/<?php echo $updateprofile['Profile_Img']?>" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                        <input type="file" class="form-control" name="Profile_Img">
                        
                        </div>
                    </div>
                    </div>
                </div>
                
                </div>
                <div class="col-8" style="margin: 0 auto;">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                        <input type="text" value="<?php echo $updateprofile['fname']?>" class="form-control" name="fname">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                        <input type="text" value="<?php echo $updateprofile['lname']?>" class="form-control" name="lname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0" hidden>id</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                        <input hidden type="text" value="<?php echo $_GET['id']?>" class="form-control" name="id">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-8">
                        <input type="email" value="<?php echo $updateprofile['Email']?>" class="form-control" name="Email">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                        <input type="text" value="<?php echo $updateprofile['Address']?>" class="form-control" name="Address">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                        <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                        
                        <input type="text" value="<?php echo $updateprofile['Username']?>" class="form-control" name="Username">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                        <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            
            </div>
          </form>
        </div>
        
        <!-- middle wrapper end -->
       
 