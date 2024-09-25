<?php

include ('connection.php');
session_start();
if (isset($_POST['create'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $email = $_POST['email'];
    $mobile = $_POST['PhoneNum'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $bdate = $_POST['birthDate'];
    $city = $_POST['city'];
    $uname = $_POST['userName'];
    $pass = $_POST['password'];
    $utype = $_POST['type'];
    $date = date("m/d/y");
    $profile = addslashes(file_get_contents('default.jpg'));

    $sql = "INSERT INTO employee_information (first_name,last_name,sex,age,birth_date,email,phone_number,city,reg_date,user_name,password,type,profile_photo,status)
    values ('$fname','$lname','$sex','$age','$bdate','$email','$mobile','$city','$date','$uname','$pass','$utype','$profile','1')";
    $query = mysqli_query($db,$sql);
    if ($query) {
        $_SESSION['msg'] = "<script>alert('$utype successfully created');</script>"; 
    }
    else{
        $_SESSION['msg'] = "<script>alert('User Account creating failed. Please try again!');</script>";
    }
    header("Location: ../../Staff/Admin/createAccountform.php");
}

?>