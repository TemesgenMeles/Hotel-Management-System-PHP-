<?php

include('connection.php');
session_start();
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $gridient = $_POST['gridient'];
    $price = $_POST['price'];
    
    $sql = "UPDATE meal set gridient = '$gridient' , price = '$price' where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        $_SESSION['msg'] = "<script>alert('Meal successfuly updated');</script>";
        header("Location: ../Staff/Chefs/manageMeal.php");
    }else{
        $_SESSION['msg'] = "<script>alert('Update failed');</script>";
        header("Location: ../../Staff/Chefs/manageMeal.php");
    }
}
if(isset($_POST['edit'])){
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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="panel col-md-6" style="border: 1px solid;">
            <div class="panel-heading">
                <center><h4>Edit Meal Information</h4>
                        <p>You can edit only the gridient and the price down below <br> clean only the the value you want update 
                        and insert the new value and<br>press update</p>
                </center>
            </div>
            <div class="panel-body">
                <form action="updateMeal.php" method="POST">
                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                    <div class="form-group">
                        <label for="mealname">Meal Name:</label>
                        <input type="text" value="<?php echo $row['meal_name']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gridient">Gridient:</label>
                        <textarea name="gridient" cols="50" rows="10" class="form-control"><?php echo $row['gridient']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">birr
                    </div>
                
            </div>
            <div class="panel-footer">
                <button type="submit" name="update" class="btn btn-success">Update</button>
                </form>
                <a href="../../Staff/Chefs/manageMeal.php" class="btn btn-primary">< Back</a>
            </div>
        </div>
    </div>
    
    
</body>
</html>
    <?php
}

?>