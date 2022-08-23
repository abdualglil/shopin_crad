<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>

<?php

session_start(); 

include 'content.php';
$error="";
 if (isset($_POST['Login'])) {
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if (isset($_POST["email"]) && isset($_POST["psw"]))

    {
        $email= mysqli_real_escape_string($content,$_POST["email"]) ;
        $paswwrdd=mysqli_real_escape_string($content,$_POST["psw"]) ;
        $checbox= isset($_POST["remember"]);
        $_SESSION['emeal'] =  $email;
            $result = mysqli_query($content,"select id,passwerd,name,tyip,imeg,tel,gender from accont where emeal='$email'");
            $reternpasswed= mysqli_fetch_assoc($result);
            $name=$reternpasswed['name'];
            $tyip=$reternpasswed['tyip'];
            $imeg=$reternpasswed['imeg'];
            $id=$reternpasswed['id'];
            $tel=$reternpasswed['tel'];
            $gendr=$reternpasswed['gender'];
            if(!password_verify($paswwrdd,$reternpasswed['passwerd'])){

                $error="passwrod is feld";
            }
            else {
                $_SESSION['id']=$id;
                $_SESSION['name']=$name;
                $_SESSION['tyip']=$tyip;
                $_SESSION['imeg']=$imeg;
                $_SESSION['tel']=$tel;
                $_SESSION['gender']=$gendr;
              

                if($checbox="on"){
                    setcookie("email",$email,time()+3600);
                    setcookie("psw",$paswwrdd,time()+3600);
                }
                header("location:new_show.php");
                
            }


        }
        
   

    }
}

?>
    
    
<form action="login.php" method="POST">

    <div class="container" style="  box-shadow: 10px 10px 5px grey;">
  
    <div class="row text-left py-5">

  <h2 style="text-align: center; text-shadow: 2px 2px 5px #0066FF;">Login </h2>

      <label for="uname"><b>Enter Email</b></label>
      <input type="text" placeholder="Enter email" name="email"  required style=" padding: 12px 20px;
  margin: 5px 0;">
  
      <label for="psw" ><b>Password</b></label>
      <input type="" placeholder="Enter Password" name="psw" required style=" padding: 12px 20px;
  margin: 5px 0;">
      <lable for="error" style="color:Red"><?php echo $error ?></lable>
      </div>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label><br>
       <div class="container" style="background-color:#f1f1f1">
      <input type="submit"  value="Login" name="Login" class="btn btn-primary my-3 py-3" style="margin-right: 0%; width: 100%;  "></input>
       
      
         
      
      <br>


      <span class="psw">Forgot <a href="#">password?</a></span>
      
    </div>
    </div>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>