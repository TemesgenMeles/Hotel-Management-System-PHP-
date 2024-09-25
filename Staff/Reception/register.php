<?php

include ('connection.php');
session_start();
if (isset($_POST['register'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $PhoneNum = $_POST['PhoneNum'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $nationality = $_POST['nationality'];
    $persons = $_POST['persons'];
    $checkout = $_POST['checkout'];
    $roomType = $_POST['room'];
    $checkin = date("m/d/y");
    
    

    
    // to know the number of days
    $checkoutdate = strtotime($checkout);
    $checkindate = strtotime($checkin);
    $days = ($checkoutdate - $checkindate)/86400;

    //to know the price of the room and room number
    if ($roomType === "Standared") {
        $name = "standared_room";
    }elseif ($roomType === "Deluxe") {
        $name = "deluxe_room";
    }else {
        $name = "presidential_room";
    }
        $book = "SELECT * from $name where status='1'";
        $result = mysqli_query($db,$book);
       
        
        
        $num = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($row['checked_in'] == 0) {
                $price = $row['price'];
                $total_price = $price * $days;
                $room_num = $row['room_number'];
                break;
            }
        }
        
    //---------------------------------------------------------------------------------------
    
    // to check the rom is not reserved
    $numrow = mysqli_num_rows($result);
    

    $reser_sql = "SELECT * from room_reservation where room_type = '$roomType'";
    $reser_result = mysqli_query($db,$reser_sql);
    $num = 0;
    while ($reser_row = mysqli_fetch_array($reser_result)) {
        if($checkin < $reser_row['check_in_date']){
            if($checkout > $reser_row['check_in_date']){
                if($reser_row['number_of_room'] == 1){
                   $num++; 
                }
                elseif($reser_row['number_of_room'] == 2){
                    $num = $num + 2;
                }
                else{
                    $num = $num + 3;
                }
                
            }
        }
        elseif ($checkin > $reser_row['check_in_date']) {
            if ($checkin <= $reser_row['check_out_date']) {
                if($reser_row['number_of_room'] == 1){
                    $num++; 
                 }
                 elseif($reser_row['number_of_room'] == 2){
                     $num = $num + 2;
                 }
                 else{
                     $num = $num + 3;
                 }
            }
        }else{
            if($reser_row['number_of_room'] == 1){
                $num++; 
             }
             elseif($reser_row['number_of_room'] == 2){
                 $num = $num + 2;
             }
             else{
                 $num = $num + 3;
             }
        }
    }

    if ($num < $numrow) {
        
        //to insert customer information in registr table
        $sql = "INSERT INTO registered_customer (first_name , last_name , sex , email , phone_number , country , city , 
        nationality , reg_date) values ('$fname','$lname','$sex','$email','$PhoneNum','$country','$city','$nationality',
        '$checkin')";
        $result = mysqli_query($db,$sql);

        
        // to get customer id
        $select = "SELECT customer_ID from registered_customer where first_name = '$fname' AND email = '$email' AND reg_date = '$checkin'";
        $select_res = mysqli_query($db,$select);
        $select_row = mysqli_fetch_array($select_res);
        $ID = $select_row['customer_ID'];
        
            // to insert customer information to checkin table
        $checkin_sql = "INSERT INTO check_in (customer_ID , check_in_date , check_out_date , room_type , room_number ,
        total_price , number_of_persons , status_register) values('$ID' , '$checkin' , '$checkout' , '$roomType' , 
        '$room_num' , '$total_price' , '$persons','0')";
        $checkin_result = mysqli_query($db,$checkin_sql);
        
            // to insert customer information to reservation table for checking reserved room in booking.php and register.php
        $reservation_sql = "INSERT INTO room_reservation (customer_ID , check_in_date , check_out_date , room_type , 
        number_of_room , check_status , bank_check , accept_status , register_status , checkin_status) values ('$ID' , '$checkin' , 
        '$checkout' , '$roomType' , '1' , '1' , '1' , '1' , '0' , '1')";
        $reservation_result = mysqli_query($db,$reservation_sql);
        
            // to checked in the room that is checked by customers
        $room_sql = "UPDATE $name set checked_in = '1' where room_number = '$room_num'";
        $room_result = mysqli_query($db,$room_sql);
        

        $_SESSION['register_msg'] = "Customer successfully registered";
        

    }
    else{
        $_SESSION['register_msg'] = "there is no available ".$name." room.";
        
        
    }
    header("Location: ../../staff/Reception/registerForm.php");
}

?>