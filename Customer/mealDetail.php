<?php

include ('connection.php');
session_start();
if (isset($_POST['order'])) {
    $id = $_POST['id'];

    $sql = "SELECT * from meal where ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $_SESSION['name'] = $row['meal_name'];
    $_SESSION['price'] = $row['price'];

}

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
        <div class="panel col-md-8 panel-primary">
            <div class="panel-heading">
                <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['meal_image']).'';?>" alt="" style="border-radius: 10%; width:200px;">
                <h4><?php echo $row['meal_name'] ?></h4>
            </div>
            <div class="panel body">
                <p><?php echo $row['gridient'] ?></p>
            </div>
            <div class="panel-footer">
                <form action="order.php" method="post">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" min="1" max="5"><br>
                    <div class="form-group">
                        <label for="time">Choose Time:</label>
                        <input type="time" name="time">
                        <span class="help-block">you must enter the time In Ethiopian count</span>
                    </div>
                    
                    <div class="btn-group">
                        <input type="submit" name="deliver" value="Deliver to My Room" class="btn btn-warning" >
                        <input type="submit" name="table" value="Book a table" class="btn btn-warning">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <style>
        .deliver{
            background-color: transparent;
            border: 2px solid rgb(0, 119, 255);
            padding: 5px 15px;
            color: rgb(0, 119, 255);
            letter-spacing: 1.7px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            display: inline;
        }
        .deliver:hover{
            color: white;
            background-color: rgb(0, 119, 255);
        }
        .table{
            background-color: transparent;
            border: 2px solid rgb(2, 180, 11);
            padding: 5px 15px;
            color: rgb(2, 180, 11);
            letter-spacing: 1.7px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            display: inline;
        }
        .table:hover{
            color: white;
            background-color: rgb(2, 180, 11);
            border: 2px solid rgb(2, 180, 11);
        }
    </style>
</body>
</html>