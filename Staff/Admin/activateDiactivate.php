<?php

include('connection.php');
if (isset($_POST['activate'])) {
    $emp_id = $_POST['emp_id'];

    $sql = "UPDATE employee_information set status = '0' where emp_ID = '$emp_id'";
    $result = mysqli_query($db,$sql);
    if($result){
        header("Location: ../../Staff/Admin/activateAccount.php");
    }
}
if (isset($_POST['deactivate'])) {
    $emp_id = $_POST['emp_id'];

    $sql = "UPDATE employee_information set status = '1' where emp_ID = '$emp_id'";
    $result = mysqli_query($db,$sql);
    if($result){
        header("Location: ../../Staff/Admin/activateAccount.php");
    }
}





?>