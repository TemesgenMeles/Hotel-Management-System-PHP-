<?php

include('connection.php');
session_start();
if (isset($_POST['send'])) {
    $msg = $_POST['comment'];
    $id = $_SESSION['ID'];

    $sql = "INSERT INTO comment (customer_ID , message , seen_status , save_status) values ('$id' , '$msg' , '0' ,'0')";
    $result = mysqli_query($db,$sql);
    if ($result) {
        $_SESSION['comment_msg'] = "<script>alert('Thankyou for you comment it help us a lot!');</script>";
        header("Location: http://localhost/lucy hotel/Customer/home.php");
    }
   
    
}

?>