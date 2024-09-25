<?php

include ('connection.php');
session_start();
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $utype = $_POST['usertype'];

    $sql = "SELECT emp_ID , status from employee_information where type = '$utype' AND user_name = '$uname' AND password = '$password'";
    $query = mysqli_query($db,$sql);
    $numrow = mysqli_num_rows($query);
    if ($numrow == 0) {
        $_SESSION['login_msg'] = "User Name and Password doesn't match";
        header("Location: ../../Staff/index.php");
    }
    else{
        $row = mysqli_fetch_array($query);
        if($row['status'] == 0){
            $_SESSION['ID'] = $row['emp_ID'];
            if($utype == "Admin"){
                header("Location: ../Staff/Admin/home.php");
            }
            elseif($utype == "Manager"){
                header("Location: ../Staff/Manager/home.php");
            }
            elseif($utype == "Reception"){
                header("Location: ../Staff/Reception/home.php");
            }
            else{
                header("Location: ../Staff/Chefs/home.php");
            }
        }else{
            $_SESSION['login_msg'] = "<script>alert('you are blocked from using this system. Please contact the adminstrator');</script>";
            header("Location: ../Staff/index.php");
        }
        
    }

}


?>