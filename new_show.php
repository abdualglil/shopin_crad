

<?php 
include 'heder.php';
//include 'content.php';
$qure="SELECT * FROM elements";

 $relos= mysqli_query($content,$qure);

 $con= mysqli_num_rows($relos);
$i=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>shopping cart</title>
</head>
<body>
<div id="demo" class="carousel slide" data-bs-ride="carousel" style="height: 400px">



  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  

  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="imeg/tamanna-rumee-mIqyYpSNq3o-unsplash.jpg" alt="Los Angeles" class="d-block" style="width:100%;height: 400px">
    </div>
    <div class="carousel-item">
      <img src="imeg/tamanna-rumee-R4viFLEqOWU-unsplash.jpg" alt="Chicago" class="d-block" style="width:100%;height: 400px;">
    </div>
    <div class="carousel-item">
      <img src="imeg/mnz-ToLMORRb97Q-unsplash.jpg" alt="New York" class="d-block" style="width:100%;height: 400px">
    </div>
  </div>


  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">

   <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
  </button>
</div>
<br>

<div class="row">
    <div class="col-sm-2 p-2 bg-light text-dark" ><a href="#"><img src="imeg/make-up-kit.png"  style="width:40px;height: 40px;"></a></div>
    <div class="col-sm-2 p-2 bg-light text-dark"><a href="#"> <img src="imeg/books-stack-of-three.png"  style="width:40px;height: 40px;"></a></div>
    <div class="col-sm-2 p-2 bg-light text-dark"><a href="#"><img src="imeg/car-door.png"  style="width:40px;height: 40px;"></a></div>
    <div class="col-sm-2 p-2 bg-light text-dark"><a href="#"> <img src="imeg/clothes-hanger.png"  style="width:40px;height: 40px;"></a></div>
    <div class="col-sm-2 p-2 bg-light text-dark"><a href="#"> <img src="imeg/mop.png"  style="width:40px;height: 40px;"></a></div>
    <div class="col-sm-2 p-2 bg-light text-dark"><a href="#"> <img src="imeg/responsive-design.png"  style="width:40px;height: 40px;"></a></div>
  </div>


<div >
    <div class="row text-center py-5">

        
        <?php
        if ($con !=0){
           
            while ($row = mysqli_fetch_assoc($relos) ) :
             ?>

             
             <div class="col-md-3 col-sm-6 my-3">

            <form action="new_shw.php" method="POST"> 
                <div class="card shadow">
                    <div>
                <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid card-img-top" alt="" >
                    </div>



                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name'] ?></h5>

                
                
                    <h5> <span class="regular-price">$<?php echo $row['price']?></span><br></h5>
                                    <h5> storeg : <?php echo $row['Quantity']?></h5>
            </div>      

                    <div class="ratings">
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <div class="pro-review">
                                        <span>1 review(s)</span>
                                    </div>
                                    <?php if($tyip!=1){ ?>
                        <input type="submit" name="add" class="btn btn-primary my-3 " value="Add to cart" style="margin-right: 0%; width: 100%;">
                        <?php }?>

                    </div>
                    <?php if($tyip==1){ ?>

                     
                        <a class="btn btn-primary  " href="Update.php?iditem=<?php echo $row['id'];?>"  role=""
       style="color:#fff;">
        <span class=" text-gray-300 " >Modify</span>

    </a>
    <a class="btn btn-primary my-3 " href="delet.php?iditem=<?php echo $row['id'];?>" role=""
          style="color:#fff;">
        <span class="mr-3 text-gray-600" >Delete</span>

    </a>
       


                        <?php }?>

                </div>
            </form>

            </div>
          



    <?php
                $i++;
                endwhile;
            }
            else {
                  ?>
                        <?php
            }
             ?>
             <div class="col-md-3 col-sm-6 my-3">







        </div>

        </div>

<?php include 'footer.php'; ?>

<?php //}else{
   //header("location:login.php");
//}?>

</body>
</html>

