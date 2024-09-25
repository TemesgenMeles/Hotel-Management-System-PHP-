<?php

include('connection.php');

if(isset($_POST['enable'])){
    $id = $_POST['id'];

    $sql = "UPDATE meal set status = '0' where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        header("Location: ../../Staff/Chefs/manageMeal.php");
    }
    else{
        echo "failed enabling meal";
        echo "<a href='../../Staff/Chefs/manageMeal.php'>< Back</a>";
    }
}
if(isset($_POST['disable'])){
    $id = $_POST['id'];

    $sql = "UPDATE meal set status = '1' where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        header("Location: ../../Staff/Chefs/manageMeal.php");
    }
    else{
        echo "failed disabling meal";
        echo "<a href='../../Staff/Chefs/manageMeal.php'>< Back</a>";
    }
}


?>