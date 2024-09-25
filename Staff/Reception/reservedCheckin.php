<?php

include ('connection.php');
if (isset($_POST['check_in'])) {
    $cust_ID = $_POST['cust_ID'];
    $rese_ID = $_POST['rese_ID'];

    $sql_select = "SELECT * from room_reservation where ID = '$rese_ID'";
    $select_result = mysqli_query($db,$sql_select);
    $select_row = mysqli_fetch_array($select_result);
    
    $customer_ID = $select_row['customer_ID'];
    $check_in_date = $select_row['check_in_date'];
    $check_out_date = $select_row['check_out_date'];
    $room_type = $select_row['room_type'];

    //to know room number
    if ($room_type === "Standared") {
        $name = "standared_room";
    }elseif ($room_type === "Deluxe") {
        $name = "deluxe_room";
    }else {
        $name = "presidential_room";
    }
        $book = "SELECT * from $name where status='1' AND checked_in = '0'";
        $book_result = mysqli_query($db,$book);
        $book_row = mysqli_fetch_array($book_result);

        $room_number = $book_row['room_number'];
//----------------------------------------------------------------------------
// to update checkin status
        $update_room = "UPDATE $name set checked_in = '1' where room_number  = '$room_number'";
        $excute_room = mysqli_query($db,$update_room);
//-------------------------------------------------------------------------------
    $total_price = $select_row['total_price'];
    $number_of_persons = $select_row['number_of_person'];


    $sql_update = "UPDATE room_reservation set checkin_status = 1 where ID = '$rese_ID'";
    $update_result = mysqli_query($db,$sql_update);
    
    $insert_sql = "INSERT INTO check_in (customer_ID , check_in_date , check_out_date , room_type , room_number , total_price , 
    number_of_persons , status_register) values ('$customer_ID' , '$check_in_date' , '$check_out_date' ,'$room_type', 
    '$room_number' , '$total_price' , '$number_of_persons' , '1')";
    $excute_insert = mysqli_query($db,$insert_sql);
    if ($update_result && $excute_insert) {
        $_SESSION['checkin_msg'] = "<script>alert('customer successfuly checkin');</script>";
        header("Location: ../../Staff/Reception/checkinCustomers.php");
    }
}







?>