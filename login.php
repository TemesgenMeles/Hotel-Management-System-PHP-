<?php
session_start();
include('connection.php');

if (isset($_POST['login'])) {
    $uname=$_POST['username'];
    $pass=$_POST['password'];

    $query = "SELECT customer_ID,user_name,password from customer_information where user_name='$uname'";
    $result = mysqli_query($db,$query);

    $numrows = mysqli_num_rows($result);
    echo $numrows;
    if($numrows == 1){
        $row = mysqli_fetch_array($result);
        $_SESSION['ID'] = $row['customer_ID'];
        if ($row['password'] == $pass) {
            header('Location: http://localhost/lucy hotel/Customer/home.php');
        }
        else {
             $_SESSION['failed']  = "User name and password doesn't match";
             header('Location: http://localhost/lucy hotel/loginform.php');
        }
        
    }elseif ($numrows == 0) {
        $_SESSION['failed'] = "User name not found";
        header('Location: http://localhost/lucy hotel/loginform.php');
    }else{
        echo "Error found more than one account"; 
    }
}
?>