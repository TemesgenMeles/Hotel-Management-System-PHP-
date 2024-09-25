<?php

include('connection.php');
session_start();
if(isset($_POST['send'])){
    $cus_id = $_POST['id'];
    $msg = $_POST['msg'];
    $sql = "INSERT INTO replay_msg (customer_ID , message) values ('$cus_id' , '$msg')";
    $result = mysqli_query($db,$sql);
    if($result){
        $_SESSION['comment_msg'] = "<script>alert('message sent successfully!');</script>";
        header("Location: ../../Staff/Manager/newComment.php");
    }else{
        echo "message sent failed " . mysqli_error($db);
        echo "<a href='../../Staff/Manager/newComment.php'>< Back</a>";
    }
}

?>