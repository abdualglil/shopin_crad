<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الاصناف</title>
</head>
<body>

<?php include 'heder.php';?>


<form action="add.php" class="was-validated" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3" >
      <label for="uname" class="form-label"> اسم المنتج :</label>
      <input type="text" class="form-control" id="p_name" placeholder="ادخل الاسم " name="p_name" required style="width: 30%; display:inline;">

      <div class="valid-feedback">.</div>
      <div class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">صوره المنتج:</label>
        <input type="file" class="form-control" id="eml" placeholder="" name="image" required style="width: 15%;display:inline " >
        <div class="valid-feedback"></div>
        <div class="invalid-feedback"></div>
      </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">سعر المنتج</label>
      <input type="number" class="form-control" id="pwd"  name="pric" required style="width: 20%; display:inline;">
      <label for="pwd" class="form-label">سعر البيع</label>
      <input type="number" class="form-control" id="pwd"  name="p_pric" required style="width: 20%; display:inline;">
      <label for="pwd" class="form-label"> الكميه </label>
      <input type="number" class="form-control" id="pwd"  name="Quantity" required style="width: 20%; display:inline;">
      <div class="valid-feedback"></div>
      <div class="invalid-feedback"> </div>
    </div>
    <div class="container mt-3" style="margin-right: 0%;">
           
      <label for="browser" class="form-label">اختر فئه المنتج:</label>
      <select  id="browsers" class="form-control" name="category">
        <option value="1">ملابس</option>
        <option value="2">الايكترونيات</option>
        <option value="3">ادوات منزل</option>
        <option value="4">ادوات تجميل</option>
        <option value="5">قرطاسيات</option>
        <option value="6">اثاث</option>
        <option value="7">ادوات المزرعه</option>
        <option value="8"> كتب </option>
        <option value="9">قطع غيار</option>
      </select >    </div>
    
 

    <br><input type="submit" class="btn btn-primary" name="save"  value="حــفــظ" style="margin-right: 0%; width: 100%;" ></input>
  </form><br><br><br><br>
  <?php include 'footer.php'; ?>

</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['save'])) 
  
  {
  
   // $id=mysqli_real_escape_string($content,$_POST['p_id']) ;
     $neam=mysqli_real_escape_string($content,$_POST['p_name']) ;
      $pric=mysqli_real_escape_string($content,$_POST['pric']) ;
      $p_pric=mysqli_real_escape_string($content,$_POST['p_pric']) ;
      $Quantity=mysqli_real_escape_string($content,$_POST['Quantity']) ;
      $category=mysqli_real_escape_string($content,$_POST['category']) ;


      $quer="SELECT MAX(id) AS mid FROM elements";
      $relos=mysqli_query($content,$quer);
      $data=mysqli_fetch_array($relos);
      $id=$data['mid']+1;


      $image = $_FILES['image']['name'];
      $tmp_image=$_FILES['image']['tmp_name'];
      $imageSize =$_FILES['image']['size'];
        $imegExt =explode(".",$image);
        $imageExtension =$imegExt[1];
       if($imageExtension=="PNG" || $imageExtension=="png" || $imageExtension=="JPG" || $imageExtension=="jpg")
      {  

        $image = rand(0,100000).rand(0,100000).rand(0,100000).time().".".$imageExtension;

      $quer = "INSERT INTO elements (id, name, price, p_pric, Quantity, category,image) VALUES ($id,'$neam',$pric ,$p_pric ,$Quantity,'$category','$image')";
      if(mysqli_query($content,$quer)) {
        if(move_uploaded_file($tmp_image,"uploads/$image")){}

      }

      }




      
    

}

}

?>