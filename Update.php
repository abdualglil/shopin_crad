
<?php
include 'heder.php';


$id =$_GET['iditem'];



$namea=$_SESSION['name'];
$tyip=$_SESSION['tyip'];
$imeg=$_SESSION['imeg'];
$ida=$_SESSION['id'];

$table = 'elements';
if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $p_pric = $_POST['p_pric'];
    $pric = $_POST['price'];
    $Quantity = $_POST['Quantity'];
   
    $query_update = "UPDATE $table SET name='$name', p_pric=$p_pric, price=$pric,Quantity=$Quantity,category='$category' WHERE id=$id";
    $result_update = mysqli_query($content, $query_update);

    $query = "SELECT * FROM $table WHERE id=$id";
    $result = mysqli_query($content, $query);
    header("location:new_show.php");

} else {
    $query = "SELECT * FROM $table WHERE id=$id";
    $result = mysqli_query($content, $query);
}
$row = mysqli_fetch_assoc($result);
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الاصناف</title>
</head>
<body>
    <div class="container mt-3">
        <h2 >تعديل الصنف</h2>
        
        <form  method="post" action="Update.php?iditem=<?php echo $id;?>&ida=<?php echo $ida;?>&namea=<?php echo $namea;?>&tyip=<?php echo $tyip;?>&imeg=<?php echo $imeg;?>">
          <div class="row">
            <div class="col">
                <label>اسم الصنف</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="col">
                <label> سعر الشراء </label>
              <input type="text" class="form-control"  name="p_pric" value="<?php echo $row['p_pric']; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
                <label>سعر البيع</label>
              <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
            </div>
            <div class="col">
                <label>الكميه</label>
              <input type="text" class="form-control"  name="Quantity" value="<?php echo $row['Quantity']; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
                
                <label for="browser" class="form-label"> الفئه </label>
                <select  id="browsers" class="form-control" name="category">
                  <option value="1"  <?php if($row['category']==1) echo "selected" ; ?>>ملابس</option>
                  <option value="2" <?php if($row['category']==2) echo "selected" ; ?>>الايكترونيات</option>
                  <option value="3"<?php if($row['category']==3) echo "selected" ; ?>>ادوات منزل</option>
                  <option value="4"<?php if($row['category']==4) echo "selected" ; ?>>ادوات تجميل</option>
                  <option value="5"<?php if($row['category']==5) echo "selected" ; ?>>قرطاسيات</option>
                  <option value="6"<?php if($row['category']==6) echo "selected" ; ?>>اثاث</option>
                  <option value="7"<?php if($row['category']==7) echo "selected" ; ?>>ادوات المزرعه</option>
                  <option value="8"<?php if($row['category']==8) echo "selected" ; ?>> كتب </option>
                  <option value="9"<?php if($row['category']==9) echo "selected" ; ?>>قطع غيار</option>
                </select >    </div> 

            </div>
           
          </div>
                <input type="submit" name="update" value="Update" class="btn btn-primary my-3 " style=" width: 30%;    display: block;
    margin-left: auto;
    margin-right: auto;" >

        </form>
      </div>
      <?php include 'footer.php'; ?>
</body>
</html>