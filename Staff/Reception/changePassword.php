<?php
session_start();
include ("connection.php");

if(isset($_POST['change'])){
    $curpass = $_POST['curPass'];
    $newpass = $_POST['newPass'];
    $conpass = $_POST['conPass'];
    $ID = $_SESSION['ID'];
    $qu = "SELECT password from employee_information where emp_ID = $ID";
    $result = mysqli_query($db,$qu);
    $row = mysqli_fetch_array($result);
    if ($row['password'] == $curpass) {
        if ($newpass == $conpass) {
            $query = "UPDATE employee_information set password = '$newpass' where emp_ID = '$ID'";
            $update = mysqli_query($db, $query);
            $_SESSION['success'] = "password change successfully";
            header('Location: ../../Staff/Reception/home.php');
        }else {
            echo "new password doesn't match confirm password";
        }
    }else {
        echo "Incorrect password";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucy Hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="col-md-7" style="border: 2px solid green;">
    <form action="changePassword.php" method="post" class="form-vertival">
        <label for="currentPassword">Current password:</label>
        <input type="text" name="curPass" placeholder="Current password" class="form-control">
        <label for="NewPassword">New password:</label>
        <input type="password" name="newPass" placeholder="Current password" class="form-control">
        <label for="confirmPassword">Conifrm password:</label>
        <input type="password" name="conPass" placeholder="Current password" class="form-control">
        <input type="submit" name="change" value="Change" class="chenge">
        <style>
            .chenge{
                margin-top: 10px; 
                padding: 5px 20px; 
                border: 2px solid #ffce14;
                background-color: transparent;
                border-radius: 5em;
            }
             
        </style>
    </form>
    <a href="../../Staff/Reception/home.php" class="btn btn-primary" style="float: right;">Home</a>
</div>
</body>
</html>
