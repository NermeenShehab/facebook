<?php 

//connection 
   $conn= new PDO("mysql:host=localhost;dbname=Facebook","root","");
    
//registeration
if (isset($_POST['signup'])) {
  //validation
    $FirstName = testinput($_POST ['firstname']);
    $LastName= testinput($_POST ['lastname']);
    $Username = testinput($_POST ['username']);
    $Address = testinput($_POST ['address']);
    $gender = testinput($_POST['gender']);
    $Email =testinput($_POST['email']);
    $password=testinput($_POST['password']);
    $confirmPass=testinput($_POST['confirmpass']);
    
 
   // add image to image folder
   $imgName = $_FILES['img']['name'];
   $imgtmp =$_FILES['img']['tmp_name'];
  
   //validation img
   $imgext = pathinfo($imgName,PATHINFO_EXTENSION);

   $extarr = ['png','jpg','jpeg'];

   if(in_array($imgext,$extarr)){
       move_uploaded_file($imgtmp,"./images/".$imgName);
   
       if (filter_var( $Email, FILTER_VALIDATE_EMAIL) && $password==$confirmPass  ) {
        
         $conn->query("insert into users 
                          set
                          fname= ' $FirstName',
                          lname = ' $LastName',
                          Username = '$Username',
                          Address ='$Address ',
                          Email= ' $Email',
                          Password= '$password',
                          Gender = '$gender',
                          Profile_Img='{$_FILES['img']['name']}'               
                          ");
        }
          header("Location:login.php");                
    } else{
        header("Location:signup.php");
    }
    

  
}
  //login
if (isset($_POST['login'])) {
  session_start();  
  $query= $conn->query("select * from users where Username='{$_POST ['username']}' and  Password='{$_POST['password']}' ");
        $uselogin=$query -> fetch(PDO::FETCH_ASSOC);
        $id= $uselogin['User_Id'];
                $count = $query->rowCount();  
                if($count > 0)  
                {  
                  setcookie("username",$_POST ['username']);
                  setcookie("password",$_POST['password']);
                  setcookie("userid", $id);
                   header("Location:index.php");  
                }  else{
                  header("Location:login.php");
                }        
}

  function testinput($input) {
    $data=trim($input);
    $stripdata=stripslashes($data);
    $validate= htmlspecialchars($stripdata);
    return $validate;
}
?>