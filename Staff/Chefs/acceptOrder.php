<?php

include('connection.php');
if (isset($_POST['accept'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];

    $sql = "UPDATE meal_order set status = '1' where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if ($result) {
        if($type == "Room"){
            header("Location: ../../Staff/Chefs/orderDelivery.php");
        }else{
            header("Location: ../../Staff/Chefs/bookTable.php");
        }
        
    }
    else{
        echo mysqli_error($db);
        if($type == "Room"){
           echo "<a href='../../Staff/Chefs/orderDelivery.php'>< Back</a>";
        }else{
            echo "<a href='../../Staff/Chefs/bookTable.php'>< Back</a>";
        }
        
    }
}
if (isset($_POST['deliver'])) {
    $id = $_POST['id']; 
    $cust_id = $_POST['cust_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $meal = $_POST['meal'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $price = $_POST['price'];


    $sql_insert = "INSERT INTO meal_record(customer_ID , first_name , last_name , meal , type , quantity , date , price)
     values('$cust_id' , '$fname' , '$lname' , '$meal' , '$type' , '$quantity' , '$date' , '$price')";
     $result_insert = mysqli_query($db,$sql_insert);

     $sql_delete = "DELETE from meal_order where ID = '$id'";
     $result_delete = mysqli_query($db,$sql_delete);

     if($result_insert && $result_delete){
        if($type == "Room"){
            header("Location: ../../Staff/Chefs/orderDelivery.php");
        }else{
            header("Location: ../../Staff/Chefs/bookTable.php");
        }
     }
     else{
        echo mysqli_error($db);
        if($type == "Room"){
            echo "<a href='../../Staff/Chefs/orderDelivery.php'>< Back</a>";
         }else{
             echo "<a href='../../Staff/Chefs/bookTable.php'>< Back</a>";
         }
     }
}

?>