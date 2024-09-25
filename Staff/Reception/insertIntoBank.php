<?php

include ('connection.php');
session_start();
if (isset($_POST['checked'])) {
    $type = $_POST['type'];
    $customer_ID = $_POST['customer_id'];
    $trans_ref = $_POST['trans_ref'];
    $bank_name = $_POST['bank_name'];
    $accountNumber = $_POST['accountNumber'];
    $accountName = $_POST['accountName'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    $sql = "INSERT INTO bank (customer_ID , trans_ref , bank_name , account_num	, acct_name , dept_amount , date) 
    values ('$customer_ID' , '$trans_ref' , '$bank_name' , '$accountNumber' , '$accountName' , '$amount' , '$date')";
    $check_status = "UPDATE $type SET check_status = 2 where customer_ID = '$customer_ID'";
    $check_result = mysqli_query($db,$check_status);

    $result = mysqli_query($db,$sql);
    if($result){
        $_SESSION['bank_msg'] = "The customer successfully reserved the hall";
        header("Location: ../../Staff/Reception/reservaationRoom.php");
    }
    else {
        die ("errror" . mysqli_error($db));
    }
}


?>