<?php
include ("connection.php");
session_start();
$ID = $_SESSION['ID'];
$checkIn = $_SESSION['check_in'];
$checkOut = $_SESSION['check_out'];
$person = $_SESSION['person'];
$roomType = $_SESSION['room-type'];
$no_room = $_SESSION['no_room'];
$cdate = date("m/d/y");
// to know the number of days
$checkoutdate = strtotime($checkOut);
$checkindate = strtotime($checkIn);
$night = ($checkoutdate - $checkindate)/86400;
//-------------------------------------------------------------
//to know the price of the room
if ($roomType === "Standared") {
    $name = "standared_room";
}elseif ($roomType === "Deluxe") {
    $name = "deluxe_room";
}else {
    $name = "presidential_room";
}
    $book = "SELECT * from $name where status='1'";
    $result = mysqli_query($db,$book);
    $row = mysqli_fetch_array($result);
    $price = $row['price'];
    $total_price = $price * $night * $no_room;
//---------------------------------------------------------------------------------------


//default image for the table because it can't be null--------------------------------

$img=addslashes(file_get_contents('image/lucy-hotel_logo.png'));

//-----------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
// to insert data to resservation table
$insert = "INSERT INTO room_reservation(customer_ID,check_in_date,check_out_date,number_of_person,room_type,number_of_room,price,total_price,nights
        ,now_date,check_status,bank_check,accept_status,register_status,checkin_status) values('$ID','$checkIn','$checkOut','$person','$roomType','$no_room',
        '$price','$total_price','$night','$cdate','0','0','0','1','0')";
        
    $excute_insert = mysqli_query($db,$insert) or die(mysqli_error($db));
//-----------------------------------------------------------------------------------------
session_unset();
$_SESSION['ID'] = $ID;

header("Location: http://localhost/lucy hotel/Customer/roomReservation.php");
?>