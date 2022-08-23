
<?php include 'heder.php';?>


<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

  if (isset($_POST['save'])) 
  
  {   
      
     $neam=mysqli_real_escape_string($content,$_POST['uname']) ;
      $tel=mysqli_real_escape_string($content,$_POST['tel']) ;
      $emel=mysqli_real_escape_string($content,$_POST['email']) ;
      $passwrd=mysqli_real_escape_string($content,$_POST['n_pswd']) ;
      $passwrdl=mysqli_real_escape_string($content,$_POST['l_pswd']) ;
      $gander=mysqli_real_escape_string($content,$_POST['gander']) ;

      $idtatyb=2;
      if(isset($_SESSION['tyip']) && $_SESSION['tyip'] ==1){
        $idtatyb=1;
      }


      $quer="SELECT MAX(id) AS mid FROM accont";
      $relos=mysqli_query($content,$quer);
      $data=mysqli_fetch_array($relos);
      $id=$data['mid']+1;


   /*if(email_exists($emel,$content)) 
   {
       echo "kk";
  }
    
  else */       
     if( $passwrd ==  $passwrdl){ 

  
     
       $passwrd=password_hash($passwrd,PASSWORD_DEFAULT);

       $quer = "INSERT INTO accont (id,name,tel,emeal,passwerd,gender,tyip,imeg) VALUES ($id,'$neam',$tel,'$emel','$passwrd',$gander,$idtatyb,'')";
      $relos=mysqli_query($content,$quer);
    if ( $idtatyb=2){
      header("location:login.php");
    }
    }
     }
      
    
    
     



}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافه مستخدم جديد</title>
</head>

<body>
    
<form method="POST" action="form.php" class="was-validated" >
    <div class="mb-3 mt-3">
      <label for="uname" class="form-label">الاسم الاول:</label>
      <input type="text" class="form-control" id="uname" placeholder="ادخل الاسم الاول" name="uname" required style="width: 35%; display:inline;">
      <label for="uname" class="form-label">هاتف العميل  :</label>
    <input type="number" class="form-control" id="tel" placeholder=" رقم الهاتف" name="tel" required style="width: 20%; display:inline;">

     
      <div class="valid-feedback">.</div>
      <div class="invalid-feedback">يرجى ملئ الحقول.</div>
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">الايميل:</label>
        <input type="email" class="form-control" id="eml" placeholder="ادخل الايميل" name="email" required style="width: 80%;display:inline " >
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">يرجى ادخال الايميل.</div>
      </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">انشى كلمه المرور:</label>
      <input type="password" class="form-control" id="pwd" placeholder="ادخل كلمة المرور الجديدi" name="n_pswd" required style="width: 31%; display:inline;">
      <label for="pwd" class="form-label">تاكيد كلمه المرور:</label>
      <input type="password" class="form-control" name="l_pswd"  placeholder="ادخل تاكيد كلمه المرور" required style="width: 31%; display:inline;">
      <div class="valid-feedback"></div>
      <div class="invalid-feedback"> يرجى ادخال كلمه مرور جديده وتاكيدها.</div>
    </div> 
 
    <div class="form-check mb-3" style="display: inline;">
        <label class="form-check-label" style=" color: brown;">
          <input class="form-check-input" type="radio" name="gander" value="1" checked> ذكر
        </label ></div>
        <div class="form-check mb-3" style="display: inline; color: brown;" >
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gander" value="0"> انثى
          </label></div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required style="margin-left: 70%;">
            <label class="form-check-label" for="myCheck">اوافق علي خصوصيات الشروط.</label>
            <div class="valid-feedback"></div>
          </div>
          
    <br>
    <input type="submit" name="save"  value="اضافه" class="btn btn-primary" style="margin-right: 0%; width: 100%;" /> 
  </form>
  <br><br><br><br>
  <?php include 'footer.php'; ?>
</body>
</html>