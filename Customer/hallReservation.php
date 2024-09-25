<?php
session_start();
include ('connection.php');
$ID = $_SESSION['ID'];
if (isset($_POST['reserve'])) {
    $arrival = $_POST['arrival'];
    $days = $_POST['days'];
    $event = $_POST['event'];
    $date = date("m/d/y");
    $sql = "SELECT * from hall where event = '$event'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $price = $row['price'];
    $total_price = $days * $price;

    $insert_sql = "INSERT INTO hall_reservation (customer_ID , check_in_date , number_of_days , event , now_date , price , 
    total_price , check_status , bank_check , accept_status) values('$ID' , '$arrival' , '$days' , '$event' , '$date' , '$price' , 
    '$total_price' , 0 , 0 , 0)";

    $insert_result = mysqli_query($db,$insert_sql);
    if($insert_result){
        $_SESSION['msg'] = "Hall successfully reserved";
    }
    else{
        $_SESSION['msg'] = "failed to reserve hall";
    }
    header("Location: http://localhost/lucy hotel/Customer/meetingHall.php");


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="http://localhost/lucy hotel/bootstrap/css/bootstrap.css">
    <style>
        .reserve{
            background-color: transparent;
            border: 2px solid rgb(0, 119, 255);
            padding: 5px 15px;
            color: rgb(0, 119, 255);
            letter-spacing: 1.7px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            margin-right: 10px;
        }
        .reserve:hover{
            color: white;
            background-color: rgb(0, 119, 255);
            border: 2px solid rgb(0, 119, 255);
        }
        .clear{
            background-color: transparent;
            border: 2px solid rgb(2, 180, 11);
            padding: 5px 15px;
            color: rgb(2, 180, 11);
            letter-spacing: 1.7px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            margin-right: 10px;
        }
        .clear:hover{
            color: white;
            background-color: rgb(2, 180, 11);
            border: 2px solid rgb(2, 180, 11);
        }
    </style>
</head>
<body>
    <form action="hallReservation.php" method="POST">
        <label for="checkin">Check in Date:</label>
        <input type="date" name="arrival">
        <label for="days">Days:</label>
        <select name="days">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <label for="event">Event:</label>
        <select name="event">
            <option value="Wedding">Wedding</option>
            <option value="Meeting">Meeting</option>
        </select>
        <input type="submit" class="btn btn-primary reserve" name="reserve" value="Reserve" >
        <input type="reset" class="btn btn-danger clear" value="Clear" >

    </form>
    <a href="http://localhost/lucy hotel/customer/meetingHall.php" class="btn btn-primary">< Back</a>
</body>

</html>
