<?php

include('connection.php');
if(isset($_POST['view'])){
    $id = $_POST['id'];

   $sql = "SELECT * from meal where ID = '$id'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result);
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="panel col-md-5" style="border: 1px solid;">
            <div class="panel-heading">
                <center>
                    <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['meal_image']).'';?>" alt="meal pic" 
                    style="border-radius: 5%; width:200px;">
                </center>
                
                <h4>Meal Name: <?php echo $row['meal_name']; ?></h4>
            </div>
            <div class="panel body">
                <p>Gridient:</p>
                <p><?php echo $row['gridient']; ?></p>
                <p>price: <?php echo $row['price']; ?> birr</p>
            </div>
            <div class="footer" style="float: right;">
                <a href="../../Staff/Chefs/manageMeal.php" class="btn btn-primary">< Back</a>
            </div>
        </div>
    </div>
</body>
</html>
   <?php
}


?>