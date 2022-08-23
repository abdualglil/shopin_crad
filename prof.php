<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> تعديل الملف الشخصي</title>
</head>
<body>

<?php include 'heder.php';?>
<form action="prof.php" class="was-validated" method="post" enctype="multipart/form-data">
   
<div class="container">
            <h1>تعديل الملف الشخصي</h1>
              <hr>
            <div class="row">
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img src="imeg/<?php echo  $_SESSION['imeg']; ?>" class="avatar img-circle" alt="avatar" style="width: 180px; height: 180px;">
                  <h6>اضافه صورة جديده...</h6>
                  <input type="file" class="form-control" name="image">

                  
                </div>
              </div>
              
              <div class="col-md-9 personal-info">
             
                <h3> معلومات شخصية</h3>
                
               
                  <div class="form-group">
                    <label class="col-lg-3 control-label">الاســــــم:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" value="<?php echo  $_SESSION['name']; ?>" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">الهـــاتـــف:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" value="<?php echo  $_SESSION['tel']; ?>" name="tal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">الجنــس:</label>
                    <div class="col-lg-8">
                      <label class="form-check-label" >
                        <input class="form-check-input" type="radio" name="gander" value="1" <?php if($_SESSION['gender']==1){echo "checked";} ?>> ذكر
                      </label>
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gander" value="0" <?php if($_SESSION['gender']==0){echo "checked";} ?>> انثى
                      </label>
                    </div>
                  </div>
             
                  <div class="form-group">
                    <label class="col-md-3 control-label">كلمــــة الــســـر:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password"  name="n_pswd">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"> تاكـــيد كلمــــة الــســـر:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" name="l_pswd">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                    
                      <span></span>
                    </div>
                  </div>
       
</div>


    <br><input type="submit" class="btn btn-primary" name="save"  value="حــفــظ" style="margin-right: 30%; width: 30%;" ></input>
  </form><br><br><br><br>
</div>
  <?php include 'footer.php'; ?>

</body>
</html>

<?php
$id =$_SESSION['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['save'])) 
  
  {
    $name=$_POST['name'];
    $tell=$_POST['tal'];
    $gendr=$_POST['gander'];

    $imed="";
    $pas="";

  
 
      $image="";
      if(!isset($_POST['image'])){
      $image = $_FILES['image']['name'];
      $tmp_image=$_FILES['image']['tmp_name'];
      $imageSize =$_FILES['image']['size'];
      $imegExt="";
      $imageExtension="";
      if($image !=""){
        $imegExt =explode(".",$image);

        $imageExtension =$imegExt[1];}
       if($imageExtension=="PNG" || $imageExtension=="png" || $imageExtension=="JPG" || $imageExtension=="jpg")
      {  

        $image = rand(0,100000).rand(0,100000).rand(0,100000).time().".".$imageExtension;
        
      



      }}
      if($image !=""){
          
        
        $_SESSION['imeg']=$image;
        $imed=",imeg='".$image."'";

    }
      
    
       
    if (isset($_POST['n_pswd']) && isset($_POST['l_pswd']) ){
        $pass=$_POST['n_pswd'];
        $pass2=$_POST['l_pswd'];
        if($pass !=""){
        if ($pass == $pass2){
  
          $passwrd=password_hash($pass,PASSWORD_DEFAULT);
          $pas=",passwerd='".$passwrd."'";
  
         
  
        }
  
                  }}


                  $query_update = "UPDATE accont SET name='$name', tel=$tell, gender=$gendr ".$imed. $pas." WHERE id=$id";
            
                $result_update = mysqli_query($content, $query_update);
                if($imed!=""){
                  if(move_uploaded_file($tmp_image,"imeg/$image")){}
            
                }
                
                $_SESSION['name']=$name;
                               
                $_SESSION['tel']=$tell;
                $_SESSION['gender']=$gendr;
                  
  

}

}

?>