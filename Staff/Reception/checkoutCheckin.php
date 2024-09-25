<?php

include('connection.php');
if(isset($_POST['checkout'])){
    $checkin_ID = $_POST['checkin_ID'];
    
    $sql = "SELECT * from check_in where ID = '$checkin_ID'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    
    $cust_id = $row['customer_ID'];
    $checkin = $row['check_in_date'];
    $checkout = date("m/d/y");
    $roomtype = $row['room_type'];
    $roomnum = $row['room_number'];
    $totalPrice = $row['total_price'];
    $person = $row['number_of_persons'];
    $status = $row['status_register'];

    //insert into checkout

    if($status == 1){
        $name = "customer_information";
    }else{
        $name = "registered_customer";
    }

    $select_sql = "SELECT * from $name where customer_ID = '$cust_id'";
    $select_result = mysqli_query($db,$select_sql);
    $sele_row = mysqli_fetch_array($select_result);

    $fname = $sele_row['first_name'];
    $lname = $sele_row['last_name'];
    $sex = $sele_row['sex'];
    $email = $sele_row['email'];
    $phone_number = $sele_row['phone_number'];

    $insert_checkout = "INSERT INTO check_out (customer_ID , first_name , last_name , sex , email , phone_number , check_in_date ,
    check_out_date , room_type , price , persons , register_status) values ('$cust_id' , '$fname' , '$lname' , '$sex' , 
    '$email' , '$phone_number' , '$checkin' , '$checkout' , '$roomtype' , '$totalPrice' , '$person' , '$status')";
    $checkout_result = mysqli_query($db,$insert_checkout);

    //------------------------------------------------------------
    //delete from reservation and checkin table

    $delete_resr = "DELETE from room_reservation where customer_ID = '$cust_id' AND register_status = '$status'";
    $re_excute = mysqli_query($db,$delete_resr);

    $delete_che = "DELETE from check_in where ID = '$checkin_ID'";
    $che_excute = mysqli_query($db,$delete_che);

    //---------------------------------------------------------

    if($checkout_result && $re_excute && $che_excute){
        header("Location: ../../Staff/Reception/checkInCustomers.php");
    }
    else{
        echo mysqli_error($db);
    }
}


?>