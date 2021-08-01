<div class="middle col-8 text-center">
        <div class="row gutters-sm " >
            <!-- <div class="col-6 mb-3" style="margin: 0 auto;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-8" style="margin: 0 auto;">
              <div class="card mb-3">
                <div class="card-body">
                <?php
              $con = new PDO("mysql:host=localhost; dbname=Facebook","root","");
              // echo $_COOKIE['userid'];
              $data=$con->query("select * from posts where User_Id='{$_COOKIE['userid']}'");
              
              // echo"select * from posts where User_Id='{$_COOKIE['userid']}'";
              $profileview=$data->fetchAll(PDO::FETCH_ASSOC); 
              // var_dump($profileview);
             
                
               
              foreach($profileview as $value){
                
                echo "
               
    <div class='card rounded mt-4'>
        <div class='card-header'>
            <div class='d-flex align-items-center justify-content-between'>
                <div class='dropdown'>
                    <button class='btn p-0' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-horizontal icon-lg pb-3px'>
                            <circle cx='12' cy='12' r='1'></circle>
                            <circle cx='19' cy='12' r='1'></circle>
                            <circle cx='5' cy='12' r='1'></circle>
                        </svg>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$value['Post_Id']}'>
                                <span class=''>View Post</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$value['Post_Id']}&action=edit'>
                                <span class=''>Edit</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='deletePost.php?id={$value['Post_Id']}'>
                                <span class=''>Delete</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <p class='mb-3 tx-14'>{$value['Body']}</p>";
            if($value['Image']){
                echo "<img src='images/{$value['Image']}'  class='img-fluid mb-4' width='500' height='250' alt='postImg'> " 
                ;};
                echo"
        </div>
        
        <div class='card-footer'>
            <div class='d-flex post-actions'>
            <a href ='post.php?id={$value['Post_Id']}'>Read More</a>
            </div>
        </div>
    </div>";
              //  echo "<br>".$value['Post_Id']."<br>";
              //   echo "<br>".$value['Image']."<br>";
              //   echo "<br>".$value['Date']."<br>";
              }
            

              
              // while($profileview=$data->fetch(PDO::FETCH_ASSOC)){
              //   echo $profileview['body'];}
              ?>
                </div>
              </div>

            </div>
          </div>
        </div>

                  <!--<div class='d-flex align-items-center'>
                    <img class='img-xs rounded-circle' src='images/{$user['Profile_Img']}' alt=''>
                      <div class='ml-2'>
                          <p>{$user['fname']} {$user['lname']}</p>
                          <p class='tx-11 text-muted'>{$value['Date']}</p>
                      </div>
                </div>-->
