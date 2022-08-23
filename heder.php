 
<?php 

if (!isset($_SESSION['name'])){

session_start(); 

}

$tyip=2;

include 'content.php';


if (isset($_SESSION['name'])){

  $neem=$_SESSION['name'];
  $tyip=$_SESSION['tyip'];
  

//$imeg=$_GET['imeg'];
$sys="تسجيل الخروج";
$systemlo="loguot.php";
}
else{
  $neem="sign in";
$sys="هل أنت مستخدم جديد؟ اضغط هنا";
$systemlo="form.php";
}


if(isset($_SESSION['imeg'])){
  $imeg=$_SESSION['imeg'];
  
}
else{
  $imeg="undraw_profile.svg";
}

?>

<!DOCTYPE html> 
<?php include 'content.php';  ?> 
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  
  

</head>

<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="imeg/logo.webp" width="40px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="collapsibleNavbar">

    <ul class="navbar-nav"><h5>
  

    <?php if($tyip!=1){ ?>
      
        <li class="nav-item">
          <a class="nav-link" href="#">الرئسيه</a>
        </li></h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="#">العروض</a>
        </li></h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="#">خدمه العملاء</a>
        </li>  </h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="#">من نحن</a>
        </li></h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="#">اتصل بناء</a>
        </li></h5>
        
        <?php }?>

        <?php if($tyip==1){ ?>

          <li class="nav-item">
          <a class="nav-link" href="new_show.php">الرئسيه</a>
        </li></h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="form.php">اضاقه مستخدم ادمن</a>
        </li></h5>
        <li class="nav-item"><h5>
          <a class="nav-link" href="add.php">اضافه اصناف</a>
        </li>  </h5>
    
          <?php }?>
      </ul> 

    </div> 


  

<div class="container "  dir="ltr" style=" width:auto;">

<!-- Nav Item - User Information -->
<ul class="nav nav-pills">
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role=""
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff;">
        <span class="mr-3 d-lg-inline  text-gray-600 " ><?php echo $neem;?></span>

      <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
        <img class="img-profile rounded-circle"  style="width: 30px; height: 35px;"
            src="imeg/<?php echo $imeg;?>">
    </a>
    <!-- Dropdown - User Information -->
    
    <ul class="dropdown-menu">
      
       <?php if (!isset($_SESSION['name'])){ ?>
        <li> <a class="btn btn-primary my-3" style="width: 100%" href="login.php">
           
           تسجيل الدخول
       </a></li>
        <?php }else {?>

          <li>  <a class="dropdown-item" href="prof.php">
           
           Profile
       </a></li>

        <li> <a class="dropdown-item" href="#">
          
           Settings
       </a></li>
          <?php }?>
        <li>
        
        <a class="dropdown-item" href="<?php echo $systemlo; ?>" data-toggle="modal" data-target="#logoutModal">
          
            <?php echo $sys; ?>
        </a></li>
  </ul>
</li>
</ul>         
</div>
<a class="navbar-brand" href="#" id="" > 

<i class="material-icons" style="font-size:48px;color:blak">shopping_cart</i>    </a>


</nav>  



</body>
</html>