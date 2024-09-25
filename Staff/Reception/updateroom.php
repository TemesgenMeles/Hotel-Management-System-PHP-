<?php

include ('connection.php');
if (isset($_POST['update'])) {
    $room_ID = $_POST['room_ID'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];

    if($room_type == "Standared"){
        $name = "standared_room";
    }elseif ($room_type == "Deluxe") {
        $name = "deluxe_room";
    }else{
        $name = "presidential_room";
    }

    $sql = "UPDATE $name SET price = '$price' where room_number  = '$room_ID'";
    $result = mysqli_query($db,$sql);
    if($result){
        header("Location: ../../Staff/Reception/room.php");
        
    }
    else{
        echo "error updating room" . mysqli_error($db);
    }

}



?>