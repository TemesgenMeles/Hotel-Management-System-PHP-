<?php
    include "connection.php";
    session_start();
    $ID = $_SESSION['ID'];
if (isset($_POST["upload"])) {
    $transaction1=addslashes(file_get_contents($_FILES['transaction']['tmp_name']));
    $query = "UPDATE hall_reservation set transaction = '$transaction1' , check_status = '1' where customer_ID = '$ID'";
    $result = mysqli_query($db,$query);
    if($result){
        $_SESSION['success'] = "Transaction image successfully uploaded. Now wait a success message from the hotel.";
        header("Location: http://localhost/lucy hotel/Customer/meetingHall.php");
    }
    
}

?>