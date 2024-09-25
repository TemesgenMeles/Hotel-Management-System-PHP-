<?php

include ('connection.php');
if (isset($_POST['accept'])) {
    $reserv_id = $_POST['reserv_id'];

    $sql = "UPDATE hall_reservation set accept_status = 1 where ID = '$reserv_id'";
    $result = mysqli_query($db,$sql);
    header("Location: ../../Staff/Reception/reservationHall.php");
}

?>