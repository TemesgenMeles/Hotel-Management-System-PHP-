<?php

include ('connection.php');
session_start();
if(isset($_POST['deliver'])){
    $mealname = $_SESSION['name'];
    $price = $_SESSION['price'];
    $quntity = $_POST['quantity'];
    $cus_id = $_SESSION['ID'];
    $deliver = "Room";
    $totalprice = $price * $quntity;
    $date = date("m/d/y");
    $time = $_POST['time'];

    $sql = "INSERT INTO meal_order (customer_ID , meal_name , quantity , deliver_type , total_price , date , time , status)
        values ('$cus_id' , '$mealname' , '$quntity' , '$deliver' , '$totalprice' , '$date' , '$time' , '0')";
    $result = mysqli_query($db,$sql);
    if ($result) {
        $_SESSION['msg'] = "<script>alert ('your meal delivered to your room shortly');</script>";
    }else{
        $_SESSION['msg'] = "<script>alert ('sorry! meal ordering failed. try again');</script>";
    }
    header("Location: http://localhost/lucy hotel/customer/viewOrder.php");
}
if(isset($_POST['table'])){
    $mealname = $_SESSION['name'];
    $price = $_SESSION['price'];
    $quntity = $_POST['quantity'];
    $cus_id = $_SESSION['ID'];
    $deliver = "Table";
    $totalprice = $price * $quntity;
    $date = date("m/d/y");
    $time = $_POST['time'];

    $sql = "INSERT INTO meal_order (customer_ID , meal_name , quantity , deliver_type , total_price , date , time , status)
        values ('$cus_id' , '$mealname' , '$quntity' , '$deliver' , '$totalprice' , '$date' , '$time' , '0')";
    $result = mysqli_query($db,$sql);
    if ($result) {
        $_SESSION['msg'] = "<script>alert ('we will waiting you in the resturant.');</script>";
    }else{
        $_SESSION['msg'] = "<script>alert ('sorry! meal ordering failed. try again');</script>";
    }
    header("Location: http://localhost/lucy hotel/customer/viewOrder.php");
}
?>