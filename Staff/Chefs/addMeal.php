<?php

include ('connection.php');
session_start();
if (isset($_POST['add'])) {
    $mname = $_POST['mealName'];
    $gridient = $_POST['gridient'];
    $price = $_POST['price'];
    $ethiopian = $_POST['Ethiopian'];
    $mimage=addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO meal (meal_name , gridient , meal_image , country , price , status) values 
    ('$mname','$gridient','$mimage','$ethiopian','$price','0')";
    $result = mysqli_query($db,$sql);
    if ($result) {
        $_SESSION['add_meal_msg'] = "$mname Added to the menu successfully";
    }
    else{
        $_SESSION['add_meal_msg'] = "Failed ! Try again!"; 
    }
    header("Location: ../../Staff/Chefs/addMealform.php");
}

?>